<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aid extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'note',
        'quantity',
        'createdBy',
    ];

    public function employe()
    {
       return $this->belongsTo(Employee::class , 'createdBy');
    }

    public function AidForAidDistributionCampaigns()
    {
        return $this->hasMany(AidForAidDistributionCampaigns::class , 'aidID');
    }
}
