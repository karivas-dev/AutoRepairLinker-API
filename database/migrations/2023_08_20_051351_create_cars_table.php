<?php

use App\Models\Insurer;
use App\Models\Model;
use App\Models\Owner;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('plates');
            $table->string('serial_number');
            $table->foreignIdFor(Owner::class)->constrained();
            $table->foreignIdFor(Model::class)->constrained();
            $table->foreignIdFor(Insurer::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
