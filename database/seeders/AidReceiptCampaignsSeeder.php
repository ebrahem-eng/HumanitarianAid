<?php

namespace Database\Seeders;

use App\Models\AidRecieptCampaigns;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AidReceiptCampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AidRecieptCampaigns::create([
            'name' => 'Aid_test',
            'date' => '6-4-2024',
            'startTime' => '10:30 AM',
            'endTime'=>'12:30 Pm',
            'priority'=> 'test',
            'note'=>'no thing to add',
            'createdBy'=>'1',
        ]);
    }
}
