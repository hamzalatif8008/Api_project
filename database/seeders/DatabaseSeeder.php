<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BannerSeeder::class);
        $this->call(DefaultAdminSeeder::class);
        $this->call(GeneralSettingSeeder::class);
        $this->call(CurrencieSeeder::class); 
        $this->call(PageSettingSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(SeoSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(SocialLinkSeeder::class);
    }
}
