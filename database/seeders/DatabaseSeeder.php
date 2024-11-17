<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        \App\Models\User::factory(1)->create();
        //Social Media Seeder is 5 because we have 5 hardcoded media for the compamy
        \App\Models\SocialMedia::factory(5)->create();
    }
}
