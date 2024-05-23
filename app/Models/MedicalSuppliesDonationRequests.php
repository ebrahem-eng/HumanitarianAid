<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalSuppliesDonationRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'note',
        'titer',
        'expiration',
        'donorID',
    ];

    public function Donor()
    {
        return $this->belongsTo(Donor::class , 'donorID');
    }
}
