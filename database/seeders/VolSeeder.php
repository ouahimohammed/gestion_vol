<?php

namespace Database\Seeders;

use App\Models\Vol;
use Illuminate\Database\Seeder;

class VolSeeder extends Seeder
{
    public function run(): void
    {
        Vol::factory()->count(30)->create();
    }
}
