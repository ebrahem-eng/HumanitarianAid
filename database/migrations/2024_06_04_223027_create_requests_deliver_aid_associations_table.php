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
        Schema::create('requests_deliver_aid_associations', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->tinyInteger('receivingStatus')->default('0');
            $table->string('note');
            $table->foreignId('AssociationID')->references('id')->on('associations');
            $table->foreignId('AidDistributionID')->references('id')->on('aid_for_aid_distribution_campaigns');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests_deliver_aid_associations');
    }
};
