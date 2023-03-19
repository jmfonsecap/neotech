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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('take_off_time');
            $table->text('arriving_time');
            $table->text('take_off_place');
            $table->text('destination');
            $table->text('type');
            $table->unsignedSmallInteger('price');
            $table->timestamps(); // add timestamps columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};