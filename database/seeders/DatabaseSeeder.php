<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\User;
// use App\Models\UserStatus;

use App\Models\ProductSize;
use Illuminate\Database\Seeder;
use Database\Factories\SocialMediaFactory;
use Database\Factories\UserStatusSeederFactory;
use Database\Factories\CategoryFactory as CategoryStatusFactory;
use Database\Factories\ProductSizeFactory;
use Database\Factories\ProductStatusFactory;
use Database\Factories\ProductTrendTypeFactory;

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

        // $this->call(SiteSettingSeeder::class);

        //To make fake orgadmin please use the orgAdmin array of UserFactory
        //and give multiple values instead of 1
        // \App\Models\User::factory(1)->create();
        // SocialMediaFactory::seedPredefinedData();
        // UserStatusSeederFactory::seedPredefinedData();
        // CategoryStatusFactory::seedPredefinedData();
        //ProductStatusFactory::seedPredefinedData();
        //ProductSizeFactory::seedPredefinedData();
        //ProductTrendTypeFactory::seedPredefinedData();
    }
}
