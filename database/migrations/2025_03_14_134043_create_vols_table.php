<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->id('NumVol');
            $table->string('CodeAv', 4);
            $table->string('MatPil', 8);
            $table->date('DateVol')->nullable(false);
            $table->string('VilleDép', 50)->nullable(false);
            $table->string('VilleArr', 50)->nullable(false);
            $table->integer('NbrePass');
            $table->boolean('VolRéalisé')->default(false);
            $table->timestamps();

            // Clés étrangères
            $table->foreign('CodeAv')->references('CodeAv')->on('avions')->onDelete('cascade');
            $table->foreign('MatPil')->references('MatPil')->on('pilotes')->onDelete('cascade');
        });

        // Add the check constraint using raw SQL after the table is created
        DB::statement('ALTER TABLE vols ADD CONSTRAINT check_passengers CHECK (NbrePass > 40)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
