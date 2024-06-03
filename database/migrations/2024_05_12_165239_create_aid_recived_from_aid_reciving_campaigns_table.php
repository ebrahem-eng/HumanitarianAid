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
            $table->foreignId('StaffReceivingID')->references('id')->on('campaign_staff_receiving_aids')->cascadeOnDelete();
            $table->foreignId('LocationID')->references('id')->on('location_for_aid_receiving_campaigns')->cascadeOnDelete();
            $table->string('name');
            $table->string('aidType');
            $table->integer('quantity');
            $table->string('note');
            $table->string('reasonOfRefuse')->default('-');
            $table->tinyInteger('statusAcceptStoreKeeper')->default('0');
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
