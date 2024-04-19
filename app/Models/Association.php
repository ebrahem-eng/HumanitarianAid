<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Association extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'latitude',
        'longitude',
        'address',
        'street',
        'anotherDetails',
        'createdBy'
    ];

    //علاقة الجمعيات مع المدير
    
    public function admin()
    {
       return $this->belongsTo(Admin::class , 'createdBy');
    }
}
