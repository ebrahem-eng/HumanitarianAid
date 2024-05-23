<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignStaffReceivingAid extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeID',
        'AidReceiptID',

    ];

    public function AidReciept()
    {
        return $this->belongsTo(AidRecieptCampaigns::class , 'AidReceiptID');
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class , 'AidReceiptID');
    }
}
