<?php

namespace Database\Factories;

use App\Models\Paragraphe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(3),
            'description' => $this->faker->unique()->sentence(12),
            'id_programme' => $this->faker->numberBetween(1, 15),
            'id_user' => $this->faker->numberBetween(1, 10)
        ];
    }
}

?>