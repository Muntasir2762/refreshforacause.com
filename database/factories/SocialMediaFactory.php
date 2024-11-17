<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SocialMedia;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialMedia>
 */
class SocialMediaFactory extends Factory
{

    const MEDIA_TYPE = [
        'facebook',
        'x',
        'instagram',
        'youtube',
        'linkedin'
    ];



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }

    public static function seedPredefinedData()
    {
        foreach (self::MEDIA_TYPE as $platform) {
            SocialMedia::firstOrCreate(
                ['platform' => $platform],
                [
                    'link_type' => 'link',
                    'platform_slug' => Str::slug($platform),
                ]
            );
        }
    }
}
