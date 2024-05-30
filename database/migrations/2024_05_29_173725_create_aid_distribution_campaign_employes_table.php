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
        Schema::create('aid_distribution_campaign_employes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employeeID')->references('id')->on('employees')->cascadeOnDelete();
            $table->foreignId('AidDistributionID')->references('id')->on('aid_distribution_campaigns')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_distribution_campaign_employes');
    }
};
