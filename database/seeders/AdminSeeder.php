<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@blog.test',
            'password' => Hash::make('123456789'),
        ]);
    }
}