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
        Schema::create('labs', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Category');
            $table->string('Privacy');
            $table->decimal('Latitude', 10, 7);
            $table->decimal('Longitude', 10, 7);
            $table->string('Address');
            $table->string('City');
            $table->string('Country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs');
    }
};
