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
        Schema::create('aid_reciept_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date');
            $table->string('startTime');
            $table->string('endTime');
            $table->string('priority');
            $table->string('note');
            // $table->string('reasonOfRefuse')->default('-');
            $table->tinyInteger('status')->default(0);
            $table->foreignId('createdBy')->references('id')->on('admins');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_reciept_campaigns');
    }
};
