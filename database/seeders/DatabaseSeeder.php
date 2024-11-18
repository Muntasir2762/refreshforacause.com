<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\SocialMediaFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(SiteSettingSeeder::class);
        //To make fake orgadmin please use the orgAdmin array of UserFactory
        //and give multiple values instead of 1
        \App\Models\User::factory(1)->create();
        SocialMediaFactory::seedPredefinedData();
    }
}
