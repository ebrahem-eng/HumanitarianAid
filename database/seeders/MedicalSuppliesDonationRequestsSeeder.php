<?php

namespace Database\Seeders;

use App\Models\MedicalSuppliesDonationRequests;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalSuppliesDonationRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        MedicalSuppliesDonationRequests::create([
            'name' => 'med1',
            'quantity' => '10',
            'note' => 'No',
            'titer' => '500',
            'expiration' => '20/10/2000',
            'donorID' => '1',

        ]);

    }
}
