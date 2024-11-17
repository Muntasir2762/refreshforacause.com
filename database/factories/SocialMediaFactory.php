<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialMedia>
 */
class SocialMediaFactory extends Factory
{

    const MEDIA_TYPE = [
        1 => 'facebook',
        2 => 'x',
        3 => 'instagram',
        4 => 'youtube',
        5 => 'linkedin'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'platform' => $platform = SocialMediaFactory::MEDIA_TYPE[mt_rand(1, 5)],
            'link_type' => 'link',
            'platform_slug' => Str::slug($platform)
        ];
    }
}
