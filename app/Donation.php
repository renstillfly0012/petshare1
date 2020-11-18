<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donation_name','donation_email', 'donation_amount', 'donation_transaction_id','user_id'
    ];

    protected $hidden = [
        'donation_email','donation_transaction_id',
    ];
}
