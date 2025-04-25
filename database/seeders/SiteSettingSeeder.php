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
        $setting = [
            [
                'phone'    => '01710490345',
                'email'    => 'provash20cb@gmail.com',
                'address'  => 'Hazaribag,Dhaka',
                'whatsapp' => '01710490345',
                'facebook' => 'https://www.facebook.com/',
                'twitter'  => 'https://www.x.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube'   => 'https://www.youtube.com/',
                'logo'      => 'logo.png',
                //add
                'banner'   =>'banner.png',

            ]
            ];

            SiteSetting::insert($setting);
    }
}
