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
        Schema::create('clothing_donation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('clotheType');
            $table->integer('quantity');
            $table->string('age');
            $table->string('size');
            $table->foreignId('donorID')->references('id')->on('donors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothing_donation_requests');
    }
};
