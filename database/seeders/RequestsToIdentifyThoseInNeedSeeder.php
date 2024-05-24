<?php

namespace Database\Seeders;

use App\Models\RequestsToIdentifyThoseInNeed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestsToIdentifyThoseInNeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequestsToIdentifyThoseInNeed::create([
            'name' => 'need1',
            'email' => 'need1@gmail.com',
            'phone' => '0987654321',
            'status' => '1',
            'address' => 'address 1',
            'street' => 'street 1',
            'details' => 'no Details',
            'ReceivedBy' => '1' ,
        ]);

        RequestsToIdentifyThoseInNeed::create([
            'name' => 'need2',
            'email' => 'need2@gmail.com',
            'phone' => '0987354321',
            'status' => '0',
            'address' => 'address 2',
            'street' => 'street 2',
            'details' => 'no Details',
            // 'ReceivedBy' => '1' ,
        ]);
    }
}
