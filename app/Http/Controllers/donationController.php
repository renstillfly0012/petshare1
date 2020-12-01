<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use App\Donation;
use App\Http\Requests\DonationRequest;




class donationController extends Controller
{

    public function getAllDonations(){
        $donations = Donation::orderBy('id', 'desc')->paginate(5);
        return view('admin.donate.donation')->with('donations', $donations);
    }
  
    
    public function create(DonationRequest $request){

        $sb_client =  env('SB_CLIENT_ID');
        $sb_secret = env('SB_SECRET');

        // is_numeric
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
               'ATAWA6JeTzh-x6i1c2vr7t4EZYTjAvTMuzuLQB5TG0dlERLTHwsGRRovTO2QtpSDCpiU7cNu3X7NXVwP',     // ClientID
                'EK97TjY48sf4ho76Si4rMgQQLaLpYzZs6q87zemLd0E7wrjhSFab_s0WAvTi6--iY0cgQDUtWW-J9peE'      // ClientSecret
            )
           
    );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
  
        // $item1 = new Item();
        // $item1->setName('Ground Coffee 40 oz')
        //     ->setCurrency('USD')
        //     ->setQuantity(1)
        //     ->setSku("123123") // Similar to `item_number` in Classic API
        //     ->setPrice(7.5);

        // $item2 = new Item();
        // $item2->setName('Granola bars')
        //     ->setCurrency('USD')
        //     ->setQuantity(5)
        //     ->setSku("321321") // Similar to `item_number` in Classic API
        //     ->setPrice(2);

        // $itemList = new ItemList();
        // $itemList->setItems(array($item1, $item2));

        // $details = new Details();
        // $details->setShipping(1.2)
        //     ->setTax(1.3)
        //     ->setSubtotal(17.50);
        
        $currency = geoip()->getLocation(\Request::ip())->currency;
        
        $amount = new Amount();
       
        $amount->setCurrency($currency)
            ->setTotal($request->donation_amount);
            // ->setDetails($details);
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            // ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

      
        // if($request->has('donation_name') ){
        //     // $name = explode(" ",$request->donation_name);
            
        //     // if(preg_match('/\s/',$request->donation_name))
        //     // {
        //     //     $sliced_name = $name[0].$name[1];
        //     // }
        //     $sliced_name = $request->donation_name;
          
        // }else{
        //     $sliced_name = 'Anonymous';
        // }
    
       
        $donator = str_replace(' ','', $request->donation_name);
        

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://pet-share.com/execute-payment/'.$request->donation_amount.'/'.$donator)
        ->setCancelUrl('http://pet-share.com/cancel');
        // $redirectUrls->setReturnUrl('http://petshare1.test/execute-payment/'.$request->donation_amount.'/'.$donator)
        // ->setCancelUrl('http://petshare1.test/cancel');
            
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
            
        
        $payment->create($apiContext);
       
        return redirect($payment->getApprovalLink());
        // dd($payment->getApprovalLink());
        // return $payment->getApprovalLink();


    }
    public function execute($donation_amount, $donation_name){
        
       $curr = geoip()->getLocation(\Request::ip())->currency;

    //    $sb_client =  env('SB_CLIENT_ID');
    //     $sb_secret = env('SB_SECRET');
      
  
        // dd($amount);
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ATAWA6JeTzh-x6i1c2vr7t4EZYTjAvTMuzuLQB5TG0dlERLTHwsGRRovTO2QtpSDCpiU7cNu3X7NXVwP',     // ClientID
                'EK97TjY48sf4ho76Si4rMgQQLaLpYzZs6q87zemLd0E7wrjhSFab_s0WAvTi6--iY0cgQDUtWW-J9peE'      // ClientSecret
            )
    );



    $paymentId = request('paymentId');
    $payment = Payment::get($paymentId, $apiContext);

    $execution = new PaymentExecution();
    $execution->setPayerId(request('PayerID'));

    $transaction = new Transaction();
    $amount = new Amount();
    // $details = new Details();

    // $details->setShipping(1.2)
    //     ->setTax(1.3)
    //     ->setSubtotal(17.50);

    $amount->setCurrency($curr);
    $amount->setTotal($donation_amount);
    // $amount->setDetails($details);
    $transaction->setAmount($amount);

    $execution->addTransaction($transaction);
    // dd($execution->payer_id);
    $result = $payment->execute($execution, $apiContext);
    $payerId = $result->id;
    $payerEmail = $result->payer->payer_info->email;
    $transactionId = $result->transactions[0]->related_resources[0]->sale->id;
    
   
    
    $donation = Donation::create([
        'donation_email' => $payerEmail,
        'donation_name' => $donation_name,
        'donation_amount' => $donation_amount,
        'donation_transaction_id' => $transactionId,
        'currency' => $curr,
    ]);
    
    $donation->save();

    // dd($result->transactions[0]->related_resources[0]->sale->id);

    return redirect('/')->with('success', 'Thank you for supporting our organization!');
    }
}
