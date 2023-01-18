<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoteTakingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(5),
            'company_id' => mt_rand(5),
            'title' => $this->faker->word(),
            'event' => $this->faker->word(),
            'body' => $this->faker->paragraph(mt_rand(2, 10))
        ];
    }
}
