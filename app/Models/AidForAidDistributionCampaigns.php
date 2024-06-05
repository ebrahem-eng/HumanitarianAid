<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidForAidDistributionCampaigns extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'distributionType',
        'StatusReceiptStoreKeeper',
        'returnedQuantity',
        'ReasonForReturn',
        'AidDeliveryStatus',
        'ReceiptFromStoreKeeperStatus',
        'Note',
        'AidDistributionID',
        'aidID',
    ];

    public function AidDistribution()
    {
        return $this->belongsTo(AidDistributionCampaigns::class , 'AidDistributionID');
    }

    public function Aid()
    {
        return $this->belongsTo(Aid::class , 'aidID');
    }
}
