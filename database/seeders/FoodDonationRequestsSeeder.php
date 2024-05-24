<?php

namespace Database\Seeders;

use App\Models\FoodDonationRequests;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodDonationRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        FoodDonationRequests::create([
            'name' => 'food1',
            'quantity' => '20',
            'boxSize' => 'larg',
            'expiration' => '1/1/2001',
            'donorID' => '1',
        ]);
    }
}
