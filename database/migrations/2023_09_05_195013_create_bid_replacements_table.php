<?php

use App\Models\Bid;
use App\Models\Replacement;
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
        Schema::create('bid_replacements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bid::class)->constrained();
            $table->foreignIdFor(Replacement::class)->constrained();
            $table->float('price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bid_replacements');
    }
};
