<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Donation;
use App\Http\Requests\DonationRequest;

class donationController extends Controller
{
    //

    public function getAllDonations(){
        try{
        $donations = Donation::paginate(5);
        return response()->json($donations, 200);

        }catch(\Exception $error){
        return response()->json($error, 400);
        }      
    }

    public function storeDonation(DonationRequest $request){
        dd($request);
        try{
        $donation = Donation::create([
            'donation_name' => $request->donation_name,
            'donation_amount' => $request->donation_amount,
            'donation_transaction_id' => $request->transactionId,
            'currency' => $curr,
        ]);
        
        $donation->save();

        return response()->json($user, 201);

        }catch(\Exception $error){
               return response()->json($error, 400);
        }
    }

    
}
