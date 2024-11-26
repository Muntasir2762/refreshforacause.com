<?php

namespace Database\Factories;

use App\Models\ProductStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductStatus>
 */
class ProductStatusFactory extends Factory
{

    const STATUS = [
        'live',
        'in stock',
        'not in stock',
        'sold out',
        'upcoming',
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
            ProductStatus::firstOrCreate(
                ['name' => $status],
                [
                    'slug' => Str::slug($status),
                ]
            );
        }
    }
}
