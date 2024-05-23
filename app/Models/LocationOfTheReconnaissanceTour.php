<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationOfTheReconnaissanceTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'street',
        'details',
        'latitude',
        'longitude',
        'ReconnaissanceID',
    ];

    public function ReconnaissanceTour()
    {
       return $this->belongsTo(ReconnaissanceTours::class , 'ReconnaissanceID');
    }
}
