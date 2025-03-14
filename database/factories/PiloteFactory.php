<?php

namespace Database\Factories;

use App\Models\Pilote;
use Illuminate\Database\Eloquent\Factories\Factory;

class PiloteFactory extends Factory
{
    protected $model = Pilote::class;

    public function definition(): array
    {
        return [
            'MatPil' => strtoupper($this->faker->unique()->regexify('[A-Z]{2}[0-9]{6}')),
            'NomPrénomPil' => $this->faker->name(),
            'AdressePil' => $this->faker->address(),
            'TelPil' => $this->faker->numerify('########'),
        ];
    }
}
