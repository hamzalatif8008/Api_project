<?php

namespace Database\Seeders;
use App\Models\Slider;

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([

            'title' => 'Sale',
            'description' => 'Latest Arrivals',
            'photo' => '',
            'position' => 'slide_style_left',
            'title_size' => '15',
            'title_color' => '#000000',
            'title_anime' => 'fadeIn',
            'desc_size' => '15',
            'desc_color' => '#000000',
            'desc_anime'  => 'fadeIn',
           
        ]);
    }
}
