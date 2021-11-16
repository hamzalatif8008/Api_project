<?php

namespace Database\Seeders;
use App\Models\Currency;

use Illuminate\Database\Seeder;

class CurrencieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([

            'name'  => 'USD',
            'sign'  => '$',
            'value'  => '1',
            'is_default'  => '1',
           
        ]);
    }
}
