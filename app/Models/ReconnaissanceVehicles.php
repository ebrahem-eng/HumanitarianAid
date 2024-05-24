<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReconnaissanceVehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicleID',
        'ReconnaissanceToursID',
    ];

    public function ReconnaissanceTours()
    {
        return $this->belongsTo(ReconnaissanceTours::class , 'ReconnaissanceToursID');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class ,'vehicleID');
    }
}
