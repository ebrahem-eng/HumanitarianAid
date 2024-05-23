<?php

namespace Database\Seeders;

use App\Models\ClothingDonationRequests;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClothingDonationRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        ClothingDonationRequests::create([
            'clotheType' => 'jacket',
            'quantity' => '20',
            'age' => '15',
            'size' => 'large',
            'donorID' => '1'
        ]);
    }
}
