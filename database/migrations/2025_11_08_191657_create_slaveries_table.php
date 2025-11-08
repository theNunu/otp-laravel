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
        Schema::create('slaveries', function (Blueprint $table) {
            $table->id('slavery_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('description')->nullable()->default('no hay descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slaveries');
    }
};
