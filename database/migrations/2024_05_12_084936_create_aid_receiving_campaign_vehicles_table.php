<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aid_receiving_campaign_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicleID')->references('id')->on('vehicles')->cascadeOnDelete();
            $table->foreignId('AidReceiptID')->references('id')->on('aid_reciept_campaigns')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_receiving_campaign_vehicles');
    }
};
