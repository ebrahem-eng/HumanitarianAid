<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidRecivedFromAidRecivingCampaigns extends Model
{
    use HasFactory;

    protected $fillable = [
        'AidReceiptID',
        'CampaignStaffReceivingAidID',
        'LocationsForAidReceivingCampaignsID',
        'name',
        'aidType',
        'quantity',
        'note',
        'reasonOfRefuse',
        'statusAcceptStoreKeeper',
    ];

    public function AidReciept()
    {
        return $this->belongsTo(AidRecieptCampaigns::class, 'AidReceiptID');
    }

    public function LocationForAidReceiving()
    {
        return $this->belongsTo(LocationForAidReceivingCampaigns::class, 'LocationsForAidReceivingCampaignsID');
    }

    public function EmployeAidReciept()
    {
        return $this->belongsTo(CampaignStaffReceivingAid::class, 'AidReceiptID');
    }
}
