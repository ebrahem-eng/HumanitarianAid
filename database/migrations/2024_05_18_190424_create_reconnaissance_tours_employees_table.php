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
        Schema::create('reconnaissance_tours_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employeeID')->references('id')->on('employees')->cascadeOnDelete();
            $table->foreignId('ReconnaissanceToursID')->references('id')->on('reconnaissance_tours')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reconnaissance_tours_employees');
    }
};
