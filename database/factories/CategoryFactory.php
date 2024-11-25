<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoryStatus;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    const STATUS = [
        'live',
        'archived',
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
            CategoryStatus::firstOrCreate(
                ['name' => $status],
                [
                    'slug' => Str::slug($status),
                ]
            );
        }
    }
}
