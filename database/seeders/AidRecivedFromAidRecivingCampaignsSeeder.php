<?php

namespace Database\Seeders;

use App\Models\AidRecivedFromAidRecivingCampaigns;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AidRecivedFromAidRecivingCampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AidRecivedFromAidRecivingCampaigns::create([
            'AidReceiptID' => '1',
            'CampaignStaffReceivingAidID' => '2',
            'LocationsForAidReceivingCampaignsID' => '1',
            'aidType' => 'medical',
            'quantity' => '100',
            'note' => 'no thing to add',
        ]);
    }
}
