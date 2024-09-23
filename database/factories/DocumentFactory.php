<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'filename' => fake()->name,
        ];
    }

    public function newDocument(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'new',
            ];
        });
    }
}
