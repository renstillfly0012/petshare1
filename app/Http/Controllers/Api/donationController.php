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
        $donations = Donation::paginate(0);
        return response()->json($donations, 200);

        }catch(\Exception $error){
        return response()->json($error, 400);
        }      
    }

    public function storeDonation(DonationRequest $request){
      
        try{
        $donation = Donation::create([
            'donation_email' => 'fromMobile',
            'user_id' => $request->user_id,
            'donation_name' => $request->donation_name,
            'donation_amount' => $request->donation_amount,
            'donation_transaction_id' => $request->transactionId,
        ]);
        
        $donation->save();

        return response()->json($donation, 201);

        }catch(\Exception $error){
            return response()->json($error, 400);
        }
    }

    
}
