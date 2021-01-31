<?php

namespace Database\Seeders;
use Hash;
use App\Models\Admin;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'admin_nama'        => 'johannes',
            'admin_username'    => 'johannes',
            'admin_password'    => Hash::make('johannes'),
        ]);
    }
}
