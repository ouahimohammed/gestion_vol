<?php

namespace Database\Seeders;

use App\Models\Pilote;
use Illuminate\Database\Seeder;

class PiloteSeeder extends Seeder
{
    public function run(): void
    {
        Pilote::factory()->count(15)->create();
    }
}
