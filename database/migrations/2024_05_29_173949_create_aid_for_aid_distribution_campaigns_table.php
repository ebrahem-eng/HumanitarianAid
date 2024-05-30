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
        Schema::create('aid_for_aid_distribution_campaigns', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('distributionType')->default('field');
            $table->tinyInteger('StatusReceiptStoreKeeper')->default('0');
            $table->integer('returnedQuantity')->default('0');
            $table->string('ReasonForReturn')->default('-');
            $table->tinyInteger('AidDeliveryStatus')->default('0');
            $table->string('Note');
            $table->foreignId('AidDistributionID')->references('id')->on('aid_distribution_campaigns')->cascadeOnDelete();
            $table->foreignId('aidID')->references('id')->on('aids')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_for_aid_distribution_campaigns');
    }
};
