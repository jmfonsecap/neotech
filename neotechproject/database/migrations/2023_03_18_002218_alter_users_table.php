<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('client');
            $table->string('phone');
            $table->string('address');
            $table->string('postalCode')->nullable();
            $table->string('country');
            $table->integer('points')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role']);
            $table->dropColumn(['phone']);
            $table->dropColumn(['address']);
            $table->dropColumn(['postalCode']);
            $table->dropColumn(['country']);
            $table->dropColumn(['points']);
        });
    }
};
