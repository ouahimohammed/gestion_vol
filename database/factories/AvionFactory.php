<?php

namespace Database\Factories;

use App\Models\Avion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvionFactory extends Factory
{
    protected $model = Avion::class;

    public function definition(): array
    {
        return [
            'CodeAv' => strtoupper($this->faker->unique()->regexify('[A-Z]{2}[0-9]{2}')),
            'ModèleAv' => $this->faker->randomElement(['Boeing 737', 'Airbus A320', 'Boeing 777', 'Airbus A380', 'Embraer E190']),
            'CapacitéAv' => $this->faker->numberBetween(50, 500),
        ];
    }
}
