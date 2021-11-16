<?php

namespace Database\Seeders;
use App\Models\Seotool;


use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seotool::create([

            'google_analytics' => '<script>//Google Analytics Scriptfffffffffffffffffffffffssssfffffs</script>',
            'meta_keys' => 'Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,Sea',
           
        ]);
    }
}
