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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedSmallInteger('stock');
            $table->text('brand');
            $table->text('type');
            $table->unsignedSmallInteger('price');
            $table->text('details');
            $table->timestamps(); // add timestamps columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};