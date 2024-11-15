<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siteSettings = [
            [
                'favicon_dir' => 'images/site/favicon/',
                'favicon_file_name' => 'favicon.ico',
                'logo_dir' => 'images/site/logo/',
                'logo_file_name' => 'logo.png',
                'fold_logo_dir' => 'images/site/fold-logo/',
                'fold_logo_file_name' => 'fold_logo.png',
                'address' => '123 Main Street, City, Country',
                'phone' => '+123456789',
                'email' => 'info@example.com',
                'status' => 'up', // Default status
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        SiteSetting::insert($siteSettings);
    }
}
