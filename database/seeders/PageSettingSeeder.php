<?php

namespace Database\Seeders;
use App\Models\Pagesetting;

use Illuminate\Database\Seeder;

class PageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pagesetting::create([

            'contact_success'  => 'Success! Thanks for contacting us, we will get back to you shortly.',
            'contact_email'  => 'info@127.0.0.1:8000',
            'contact_title' => 'Drop Us a line', 
            'contact_text' => '<div style="text-align: justify;">Sifting through teaspoons of clay and sand scraped from the floors of caves, German researchers have to be managed to isolate ancient human DNA without turning up a single bone.</div>', 
            'about' => '<div style="text-align: justify;">Sifting through teaspoons of clay and sand scraped from the floors of caves, German researchers have to be managed to isolate ancient human DNA without turning up a single bone.</div>', 
            'faq' => '<div style="text-align: justify;">Sifting through teaspoons of clay and sand scraped from the floors of caves, German researchers have to be managed to isolate ancient human DNA without turning up a single bone.</div>',
            'c_status' => '1', 
            'a_status' => '1', 
            'f_status' => '1',
            'bn' => 'https://www.google.com/',
            'bnimg' => '1525536094Banner1.png',
            'is_currency' => '1',
           
        ]);
    }
}
