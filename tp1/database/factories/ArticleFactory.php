<?php

namespace Database\Factories;

use App\Models\Etudient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5, true);
        return [
            'titre' => ucfirst($title),
            'contenu' => $this->faker->text(900),
            'date_de_creation' => $this->faker->date,
            'langue' => $this->faker->randomElement(['en', 'fr']),
            'etudient_id' => Etudient::factory(),
        ];
    }
}
