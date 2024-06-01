<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory , SoftDeletes , HasApiTokens, Notifiable;

    protected $guard = 'employe';
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

    public function CampaignStaffReceivingAid()
    {
        return $this->belongsTo(CampaignStaffReceivingAid::class ,'employeeID');
    }

    public function AidDistributionCampaignEmploye()
    {
        return $this->belongsTo(AidDistributionCampaignEmploye::class ,'employeeID');
    }    

    public function aid()
    {
        return $this->hasMany(Aid::class ,'createdBy');
    }

    

      /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
