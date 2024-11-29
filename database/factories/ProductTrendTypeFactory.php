<?php

namespace Database\Factories;

use App\Models\ProductTrendType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductTrendType>
 */
class ProductTrendTypeFactory extends Factory
{

    const TRENDS = [
        'hot',
        'new',
        'sale'
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
        foreach (self::TRENDS as $status) {
            ProductTrendType::firstOrCreate(
                ['trend' => $status],
                [
                    'slug' => Str::slug($status),
                ]
            );
        }
    }
}
