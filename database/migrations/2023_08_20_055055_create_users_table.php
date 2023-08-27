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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('password');
            $table->morphs('belongable');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('belongable_id', 'belongable_garage_id')->references('id')->on('garages');
            //$table->foreign('belongable_id', 'belongable_insurer_id')->references('id')->on('insurers');
            //$table->foreign('belongable_id', 'belongable_store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
