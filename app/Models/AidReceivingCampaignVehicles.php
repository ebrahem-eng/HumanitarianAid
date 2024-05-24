<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidReceivingCampaignVehicles extends Model
{
    use HasFactory;

    protected $fillable=[
        'vehicleID',
        'AidReceiptID',
    ];

    public function AidReciept()
    {
        return $this->belongsTo(AidRecieptCampaigns::class , 'AidReceiptID');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class ,'vehicleID');
    }
        
    
}
