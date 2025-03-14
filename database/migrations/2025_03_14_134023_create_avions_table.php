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
        Schema::create('avions', function (Blueprint $table) {
            $table->string('CodeAv', 4)->primary();
            $table->string('ModèleAv', 50)->nullable(false);
            $table->integer('CapacitéAv')->nullable(false);
            $table->timestamps();
        });

        // Add the check constraint using raw SQL after the table is created
        DB::statement('ALTER TABLE avions ADD CONSTRAINT check_capacity CHECK (CapacitéAv >= 50)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avions');
    }
};
