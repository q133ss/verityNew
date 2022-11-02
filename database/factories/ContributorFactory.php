<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contributor>
 */
class ContributorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'lastname' => fake()->lastName(),
            'patronymic' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'country_id' => rand(1,100),
            'recommender_id' => null,
            'city' => 'Москва',
            'sum' => '12.000'
        ];
    }
}
