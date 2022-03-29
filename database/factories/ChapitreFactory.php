<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChapitreFactory extends Factory
{
    private static $ordre = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(3),
            'contenu' => $this->faker->paragraphs(3, true),
            'ordre_doc' => self::$ordre++,
            'id_module' => $this->faker->numberBetween(1, 20)
        ];
    }
}
