<?php

namespace Database\Factories;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone_number' => fake('id_ID')->phoneNumber(),
            'provider_name' => fake('id_ID')->company(),
            'user_id' => fake()->numberBetween(1, User::all()->count()),
        ];
    }
}
