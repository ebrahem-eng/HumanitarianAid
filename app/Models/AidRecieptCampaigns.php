<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AidRecieptCampaigns extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'startTime',
        'endTime',
        'date',
        'priority',
        'note',
        'createdBy'
    ];

    public function admin()
    {
       return $this->belongsTo(Admin::class , 'createdBy');
    }

    public function AidRecivedFromAidReciving()
    {
        return $this->hasMany(AidRecivedFromAidRecivingCampaigns::class ,'AidReceiptID');
    }

    public function LocationForAidReceiving()
    {
        return $this->hasMany(LocationForAidReceivingCampaigns::class,'AidReceiptID');
    }

    public function CampaignStaff()
    {
        return $this->hasMany(CampaignStaffReceivingAid::class,'AidReceiptID');
    }

    public function AidReceivingCampaignVehicle()
    {
        return $this->hasMany(AidReceivingCampaignVehicles::class ,'AidReceiptID');
    }
}
