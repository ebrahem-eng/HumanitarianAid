<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReconnaissanceTours extends Model
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

    public function admin()
    {
       return $this->belongsTo(Admin::class , 'createdBy');
    }

    public function ReconnaissanceToursVehicle()
    {
        return $this->hasMany(ReconnaissanceVehicles::class ,'ReconnaissanceToursID');
    }

    public function ReconnaissanceToursEmployee()
    {
        return $this->hasMany(ReconnaissanceToursEmployees::class , 'ReconnaissanceToursID');
    }

    public function ReconnaissanceTourLocation()
    {
       return $this->hasMany(LocationOfTheReconnaissanceTour::class , 'ReconnaissanceID');
    }
}
