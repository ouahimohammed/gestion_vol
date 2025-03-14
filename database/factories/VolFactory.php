<?php

namespace Database\Factories;

use App\Models\Avion;
use App\Models\Pilote;
use App\Models\Vol;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolFactory extends Factory
{
    protected $model = Vol::class;

    public function definition(): array
    {
        $avions = Avion::pluck('CodeAv')->toArray();
        $pilotes = Pilote::pluck('MatPil')->toArray();

        return [
            'CodeAv' => $this->faker->randomElement($avions),
            'MatPil' => $this->faker->randomElement($pilotes),
            'DateVol' => $this->faker->dateTimeBetween('now', '+1 year'),
            'VilleDép' => $this->faker->city(),
            'VilleArr' => $this->faker->city(),
            'NbrePass' => $this->faker->numberBetween(41, 400),
            'VolRéalisé' => $this->faker->boolean(30), // 30% des vols sont réalisés
        ];
    }
}
