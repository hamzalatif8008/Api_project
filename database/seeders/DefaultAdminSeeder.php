<?php

namespace Database\Seeders;
use App\Models\Admin;
use Hash;

use Illuminate\Database\Seeder;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Planet Sid',
            'phone' => '123456789101',
            'role' => 'Administrator',
            'photo' => '',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('1234'),
            'status' => '1',
        ]);
    }
}
