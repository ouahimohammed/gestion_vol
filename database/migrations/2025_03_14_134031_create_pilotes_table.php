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
        Schema::create('pilotes', function (Blueprint $table) {
            $table->string('MatPil', 8)->primary();
            $table->string('NomPrénomPil', 50)->nullable(false);
            $table->string('AdressePil', 150)->nullable(false);
            $table->string('TelPil', 8)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilotes');
    }
};
