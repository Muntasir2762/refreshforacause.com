<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\HelperTrait;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    use HelperTrait;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $first = fake()->firstName(),
            'last_name' => $last = fake()->lastName(),
            'email' => 'admin@example.com',
            'phone' => '(208) 777-1079',
            'full_name_slug' => Str::slug($first . ' ' . $last),
            'address' => '1234 Elm Street Springfield, IL 62704 USA',
            'role' => 'companyadmin',
            'unique_ref' => $this->generateUniqueCode(),
            // 'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
