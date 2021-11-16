<?php

namespace Database\Seeders;
use App\Models\Portfolio;


use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create([

            'client'  => 'David Smith',
            'review'  => '1547893517review-profile.png',
            'photo'  => '1547893517review-profile.png',
           
        ]);
    }
}
