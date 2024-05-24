<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReconnaissanceToursEmployees extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeID',
       'ReconnaissanceToursID',
    ];

    public function ReconnaissanceTours()
    {
        return $this->belongsTo(ReconnaissanceTours::class , 'ReconnaissanceToursID');
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class , 'employeeID');
    }
}
