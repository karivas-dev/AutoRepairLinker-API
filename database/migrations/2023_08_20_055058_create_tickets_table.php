<?php

use App\Models\Car;
use App\Models\District;
use App\Models\Garage;
use App\Models\StatusTicket;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignIdFor(Garage::class)->constrained();
            $table->foreignIdFor(Car::class)->constrained();
            $table->foreignIdFor(District::class)->constrained();
            $table->foreignIdFor(StatusTicket::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
