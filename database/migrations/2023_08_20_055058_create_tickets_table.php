<?php

use App\Models\Branch;
use App\Models\Car;
use App\Models\Garage;
use App\Models\TicketStatus;
use App\Models\User;
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
            $table->foreignIdFor(User::class)->constrained();
            $table->string('description');
            $table->foreignIdFor(Garage::class)->nullable()->constrained();
            $table->foreignIdFor(Car::class)->constrained();
            $table->foreignIdFor(Branch::class)->nullable()->constrained();
            $table->foreignIdFor(TicketStatus::class)->constrained();
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
