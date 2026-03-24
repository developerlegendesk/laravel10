<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'app_name' => 'My Awesome App',
            'app_email' => 'info@example.com',
            'app_phone' => '+92-300-1234567',
            'app_logo' => null,       // Upload later via admin panel
            'app_favicon' => null,    // Upload later via admin panel

            // Email settings
            'email_from' => 'noreply@example.com',
            'email_host' => 'smtp.example.com',
            'email_port' => '587',
            'email_username' => 'username',
            'email_password' => 'password',
            'email_encryption' => 'tls',

            // Social Media Links
            'facebook' => 'https://facebook.com/yourpage',
            'tiktok' => 'https://tiktok.com/@yourpage',
            'instagram' => 'https://instagram.com/yourpage',
            'twitter' => 'https://twitter.com/yourpage',
            'linkedin' => 'https://linkedin.com/yourpage',
        ]);
    }
}
