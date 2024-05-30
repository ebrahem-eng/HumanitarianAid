<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationOfAidDistributionCampaigns extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'street',
        'latitude',
        'longitude',
        'AidDistributionID',
    ];

    public function AidDistribution()
    {
        return $this->belongsTo(AidDistributionCampaigns::class , 'AidDistributionID');
    }
}
