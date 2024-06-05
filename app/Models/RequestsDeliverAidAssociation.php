<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsDeliverAidAssociation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'receivingStatus',
        'note',
        'AssociationID',
        'AidDistributionID',
    ];

    public function association()
    {
        return $this->belongsTo(Association::class , 'AssociationID');
    }

    public function aidForAidDistribution()
    {
        return $this->belongsTo(AidForAidDistributionCampaigns::class , 'AidDistributionID');
    }

    
}

