<?php

namespace Database\Seeders;

use App\Models\Aid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Aid::create([
            'name' => 'aid 1',
            'type' => 'medical',
            'note' => 'note1',
            'quantity' => '20',
            'createdBy' => '1',
        ]);

        Aid::create([
            'name' => 'aid 2',
            'type' => 'clothing',
            'note' => 'note2',
            'quantity' => '30',
            'createdBy' => '1',
        ]);
    }
}
