<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::firstOrCreate(['slug' => 'site_title'], ['name' => 'title', 'content' => 'My Blog']);
        Config::firstOrCreate(['slug' => 'site_description'], ['name' => 'description', 'content' => 'This is my blog']);
        Config::firstOrCreate(['slug' => 'blog_header'], ['name' => 'Header', 'content' => 'MY BLOG']);
        Config::firstOrCreate(['slug' => 'blog_footer'], ['name' => 'Footer', 'content' => 'Make With Love']);
        Config::firstOrCreate(['slug' => 'social_twitter'], ['name' => 'Twitter', 'content' => 'username']);
        Config::firstOrCreate(['slug' => 'social_linkdin'], ['name' => 'Linkdin', 'content' => 'username']);
        Config::firstOrCreate(['slug' => 'social_github'], ['name' => 'Github', 'content' => 'username']);
        Config::firstOrCreate(['slug' => 'about_me'], ['name' => 'about me', 'content' => 'Hi, My name is ...']);
    }
}
