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
        Schema::create('aid_recived_from_aid_reciving_campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('AidReceiptID')->references('id')->on('aid_reciept_campaigns')->cascadeOnDelete();
            $table->integer('CampaignStaffReceivingAidID');
            $table->integer('LocationsForAidReceivingCampaignsID');
            $table->string('aidType');
            $table->integer('quantity');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_recived_from_aid_reciving_campaigns');
    }
};
