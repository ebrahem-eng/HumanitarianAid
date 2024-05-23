<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationForAidReceivingCampaigns extends Model
{
    use HasFactory;

    protected $fillable =[
        'address',
        'street',
        'details',
        'latitude',
        'longitude',
        'AidReceiptID',

    ];

    public function AidReciept()
    {
       return $this->belongsTo(AidRecieptCampaigns::class , 'AidReceiptID');
    }

    public function AidRecivedFromAidReciving()
    {
        return $this->belongsTo(AidRecivedFromAidRecivingCampaigns::class,'LocationsForAidReceivingCampaignsID');
    }

    
}
