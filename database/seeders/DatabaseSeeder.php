<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AdminSeeder::class);
        $this->call(AssociationSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(AidReceiptCampaignsSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(DonorSeeder::class);
        $this->call(MedicalSuppliesDonationRequestsSeeder::class);
        $this->call(ClothingDonationRequestsSeeder::class);
        $this->call(FoodDonationRequestsSeeder::class);
        $this->call(RequestsForMoneyDonationsSeeder::class);
        $this->call(RequestsToIdentifyThoseInNeedSeeder::class);
        
    }
}
