<?php

namespace Database\Seeders;

use App\Models\Avion;
use Illuminate\Database\Seeder;

class AvionSeeder extends Seeder
{
    public function run(): void
    {
        Avion::factory()->count(10)->create();
    }
}
