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

class donationController extends Controller
{
    
    public function create(Request $request){
        // dd($request);

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

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($request->donation_amount);
            // ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            // ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

            
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://petshare1.test/execute-payment')
        ->setCancelUrl('http://petshare1.test/cancel');
            
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
    public function execute(){
  
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
    $details = new Details();

    $details->setShipping(1.2)
        ->setTax(1.3)
        ->setSubtotal(17.50);

    $amount->setCurrency('USD');
    $amount->setTotal(20);
    $amount->setDetails($details);
    $transaction->setAmount($amount);

    $execution->addTransaction($transaction);

    $result = $payment->execute($execution, $apiContext);
    
    return $result;
    }
}
