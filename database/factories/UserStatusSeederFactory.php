<?php

namespace Database\Factories;

use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserStatusSeederFactory extends Factory
{

    const STATUS = [
        'active',
        'inactive',
        'suspended'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public static function seedPredefinedData()
    {
        foreach (self::STATUS as $status) {
            UserStatus::firstOrCreate(
                ['name' => $status],
                [
                    'slug' => Str::slug($status),
                ]
            );
        }
    }
}
