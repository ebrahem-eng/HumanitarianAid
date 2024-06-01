<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidDistributionCampaignEmploye extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeID',
        'AidDistributionID',
    ];

    public function AidDistribution()
    {
        return $this->belongsTo(AidDistributionCampaigns::class , 'AidDistributionID');
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class , 'employeeID');
    }
}
