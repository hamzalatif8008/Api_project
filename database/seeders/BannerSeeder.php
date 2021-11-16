<?php

namespace Database\Seeders;
use App\Models\Banner;

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([

            'top1'  => '154550106104-min.jpg',
            'top2'  => '154550107202-min.jpg',
            'top3'  => '15455011426-min.jpg',
            'top4'  => '154550108901-min.jpg',
            'bottom1'  => '1536060875banner-1.jpg',
            'bottom2'  => '1536060875banner-2.jpg',
            'top1l'  => 'https://www.google.com/',
            'top2l'  => 'https://www.google.com/',
            'top3l'  => 'https://www.google.com/',
            'top4l'  => 'https://www.google.com/',
            'bottom1l'  => 'https://www.google.com/',
            'bottom2l'  => 'https://www.google.com/',
        ]);
    }
}
