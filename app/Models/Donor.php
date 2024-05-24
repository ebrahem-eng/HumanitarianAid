<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Donor extends Authenticatable
{
    use HasFactory , SoftDeletes , HasApiTokens, Notifiable;

    protected $guard = 'donor';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'status',
        'age',
        'phone',
        'address',
        'img',
    ];

    public function MedicalSuppliesDonationRequests()
    {
        return $this->hasMany(MedicalSuppliesDonationRequests::class , 'donorID');
    }

    public function ClothingDonationRequests()
    {
        return $this->hasMany(ClothingDonationRequests::class , 'donorID');
    }

    public function FoodDonationRequests()
    {
        return $this->hasMany(FoodDonationRequests::class , 'donorID');
    }

    public function RequestsForMoneyDonation()
    {
        return $this->hasMany(RequestsForMoneyDonations::class , 'donorID');
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
