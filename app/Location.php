<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
        protected $fillable = [
        'report_id', 'address','address_lat', 'address_lng'
      ];

      protected $hidden = [
        'address','address_lat', 'address_lng'
    ];
  
      public function reports(){
          return $this->belongsTo('App\Report');
      }
}
