<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(5),
            'description' => $this->faker->unique()->sentence(12),
            'domaine' => $this->faker->word() 
        ];
    }
}
