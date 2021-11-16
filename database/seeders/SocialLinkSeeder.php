<?php

namespace Database\Seeders;
use App\Models\Sociallink;

use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sociallink::create([

            'facebook'  => 'https://www.facebook.com/',
            'twitter'  => 'https://twitter.com/', 
            'gplus'  => 'https://plus.google.com/', 
            'linkedin'  => 'https://www.linkedin.com/',
            'f_status'  => '1',
            't_status'  => '1', 
            'g_status'  => '1', 
            'l_status'  => '1',
            'fcheck'  => '1',
            'gcheck'  => '1',
            'fclient_id'  => '503140663460329',
            'fclient_secret'  => 'f66cd670ec43d14209a2728af26dcc43',
            'fredirect'  => 'f66cd670ec43d14209a2728af26dcc43',
            'gclient_id'  => '253048707868-gdr3bgfr89gs7simgqhjma4iqln6mj3d.apps.googleusercontent.com',
            'gclient_secret'  => '9NJDKsvEB_VAoKfg3Hd81MBN',
            'gredirect'  => 'yGBWmUpPtn5yWhDAsXnswEX3',
           
        ]);
    }
}
