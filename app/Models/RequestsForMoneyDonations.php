<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsForMoneyDonations extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'date',
        'invoiceNumber',
        'donorID',
    ];

    public function Donor()
    {
        return $this->belongsTo(Donor::class , 'donorID');
    }
    
}
