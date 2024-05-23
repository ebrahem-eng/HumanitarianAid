<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestsToIdentifyThoseInNeed extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'address',
        'street',
        'details',
        'ReceivedBy',
    ];

    public function Admin()
    {
        return $this->belongsTo(Admin::class , 'ReceivedBy');
    }
}
