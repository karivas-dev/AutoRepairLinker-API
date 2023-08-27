<?php

use App\Models\District;
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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('telephone');
            $table->boolean('main');
            $table->morphs('branchable');
            $table->foreignIdFor(District::class)->constrained();
            $table->timestamps();

            $table->foreign('branchable_id', 'branchable_garage_id')->references('id')->on('garages');
            $table->foreign('branchable_id', 'branchable_insurer_id')->references('id')->on('insurers');
            $table->foreign('branchable_id', 'branchable_store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
