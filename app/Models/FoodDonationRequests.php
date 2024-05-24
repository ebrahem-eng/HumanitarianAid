<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDonationRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'boxSize',
        'expiration',
        'donorID',
    ];

    public function Donor()
    {
        return $this->belongsTo(Donor::class , 'donorID');
    }
}
