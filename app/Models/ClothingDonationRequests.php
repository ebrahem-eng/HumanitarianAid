<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothingDonationRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'clotheType',
        'quantity',
        'age',
        'size',
        'donorID',
    ];


    public function Donor()
    {
        return $this->belongsTo(Donor::class , 'donorID');
    }
    
}
