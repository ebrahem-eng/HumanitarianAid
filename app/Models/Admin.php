<?php

namespace App\Models;

use Database\Seeders\RequestsToIdentifyThoseInNeedSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory , SoftDeletes , HasApiTokens, Notifiable;

    protected $guard = 'admin';
    protected $fillable = [

        'name',
        'email',
        'password',
        'status',
        'gender',
        'age',
        'phone',
        'address',
        'img',

    ];

    //علاقة المدير مع الجمعيات
    
    public function associations()
    {
       return $this->hasMany(Association::class , 'createdBy');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class , 'createdBy');
    }

    public function AidReciept()
    {
        return $this->hasMany(AidRecieptCampaigns::class , 'createdBy');
    }

    public function IdentifyThoseInNeed()
    {
        return $this->hasMany(RequestsToIdentifyThoseInNeed::class , 'ReceivedBy');
    }

    public function ReconnaissanceTours()
    {
        return $this->hasMany(ReconnaissanceTours::class , 'createdBy');
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
