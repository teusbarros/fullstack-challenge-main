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
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('weather_id');
            $table->string('main');
            $table->string('description');
            $table->float('temp');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('feels_like');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
