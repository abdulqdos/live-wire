<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(50),
            'content' => $this->faker->realText(500),
            'published' => $this->faker->boolean(),
            'notifications' => $this->faker->optional()->randomElements(['email', 'sms', 'push'], $this->faker->numberBetween(0, 3)),        ];

    }
}
