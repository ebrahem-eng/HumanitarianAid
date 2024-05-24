<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'type',
        'capacity',
        'availableStatus',
        'quantity',
        'phone',
        'createdBy',
    ];



    public function AidReceivingCampaignVehicle()
    {
        return $this->hasMany(AidReceivingCampaignVehicles::class , 'vehicleID');
    }

    public function AidDistributionCampaignVehicles()
    {
        return $this->hasMany(AidDistributionCampaignVehicles::class , 'vehicleID');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class , 'createdBy');
    }

    public function ReconnaissanceToursVehicle()
    {
        return $this->hasMany(ReconnaissanceVehicles::class , 'vehicleID');
    }

}
