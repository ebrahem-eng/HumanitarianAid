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
}
