<?php

namespace Database\Factories;

use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSize>
 */
class ProductSizeFactory extends Factory
{
    const SIZES = [
        'extra small',
        'small',
        'medium',
        'large',
        'extra large',
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
        foreach (self::SIZES as $status) {
            ProductSize::firstOrCreate(
                ['size' => $status],
                [
                    'slug' => Str::slug($status),
                ]
            );
        }
    }
}
