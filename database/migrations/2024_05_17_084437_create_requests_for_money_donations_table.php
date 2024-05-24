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
        Schema::create('requests_for_money_donations', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('date');
            $table->integer('invoiceNumber');
            $table->foreignId('donorID')->references('id')->on('donors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests_for_money_donations');
    }
};
