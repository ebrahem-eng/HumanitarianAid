<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidDistributionCampaignVehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicleID',
        'AidDistributionID',
    ];


    public function AidDistribution()
    {
        return $this->belongsTo(AidDistributionCampaigns::class , 'AidDistributionID');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class ,'vehicleID');
    }
}
