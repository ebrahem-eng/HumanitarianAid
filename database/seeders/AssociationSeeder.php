<?php

namespace Database\Seeders;

use App\Models\Association;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Association::create([
            'name'=> 'Association1',
            'email' => 'association@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'type'=> 'charity',
            'latitude' => '22.00',
            'longitude' => '23.00',
            'address' => 'address 1',
            'street' => 'street 1',
            'anotherDetails' => 'no details',
            'createdBy' => '1',
        ]);
    }
}
