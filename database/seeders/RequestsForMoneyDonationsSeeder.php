<?php

namespace Database\Seeders;

use App\Models\RequestsForMoneyDonations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestsForMoneyDonationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        RequestsForMoneyDonations::create([
            'amount' => '20000',
            'date' => '1/1/2000',
            'invoiceNumber' => '093628',
            'donorID' => '1',
        ]);
    }
}
