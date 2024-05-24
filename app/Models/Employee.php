<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [

        'name',
        'email',
        'password',
        'status',
        'gender',
        'status',
        'age',
        'phone',
        'address',
        'img',
        'type',
        'createdBy',
    ];

    //علاقة الموظفين مع المدير
    public function admin()
    {
        return $this->belongsTo(Admin::class , 'createdBy');
    }

    public function vehicles()
    {
        return $this->belongsTo(Vehicles::class , 'createdBy');
    }

    public function ReconnaissanceToursEmployee()
    {
        return $this->belongsTo(ReconnaissanceToursEmployees::class , 'employeeID');
    }
}
