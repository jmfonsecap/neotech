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
        Schema::create('custom_computer_part', function (Blueprint $table) {
            //$table->id();
            $table->primary(['custom_computer_id','part_id']);
            $table->unsignedBigInteger('custom_computer_id');
            $table->unsignedBigInteger('part_id');
            $table->timestamps();

            $table->foreign('custom_computer_id')->references('id')->on('custom_computers');
            $table->foreign('part_id')->references('id')->on('parts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_computer_part');
    }
};
