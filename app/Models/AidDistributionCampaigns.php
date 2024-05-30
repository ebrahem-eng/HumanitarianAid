<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AidDistributionCampaigns extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'startTime',
        'endTime',
        'date',
        'priority',
        'note',
        'status',
        'createdBy'
    ];

    public function admin()
    {
       return $this->belongsTo(Admin::class , 'createdBy');
    }

    public function AidDistributionCampaignVehicles()
    {
       return $this->hasMany(AidDistributionCampaignVehicles::class , 'AidDistributionID');
    }

    public function AidDistributionCampaignEmploye()
    {
       return $this->hasMany(AidDistributionCampaignEmploye::class , 'AidDistributionID');
    }

    public function AidForAidDistributionCampaigns()
    {
       return $this->hasMany(AidForAidDistributionCampaigns::class , 'AidDistributionID');
    }

    public function LocationOfAidDistributionCampaigns()
    {
       return $this->hasMany(LocationOfAidDistributionCampaigns::class , 'AidDistributionID');
    }
}
