<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Vehicles::create([
            'name' => 'v1',
            'type' => 't1',
            'capacity' => 'c1',
            'availableStatus' => '1',
            'quantity' => '3',
            'createdBy' => '1',
        ]);

        Vehicles::create([
            'name' => 'v2',
            'type' => 't2',
            'capacity' => 'c2',
            'availableStatus' => '1',
            'quantity' => '10',
            'createdBy' => '1',
        ]);
    }
}
