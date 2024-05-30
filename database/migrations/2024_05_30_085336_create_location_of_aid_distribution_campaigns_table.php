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
        Schema::create('location_of_aid_distribution_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('street');
            $table->double('latitude');
            $table->double('longitude');
            $table->foreignId('AidDistributionID')->references('id')->on('aid_distribution_campaigns')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_of_aid_distribution_campaigns');
    }
};
