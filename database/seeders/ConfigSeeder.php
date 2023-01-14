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
        Config::firstOrCreate(['name' => 'title', 'slug' => 'site_title', 'content' => 'My Blog']);
        Config::firstOrCreate(['name' => 'description', 'slug' => 'site_description', 'content' => 'This is my blog']);
        Config::firstOrCreate(['name' => 'Header', 'slug' => 'blog_header', 'content' => 'MY BLOG']);
        Config::firstOrCreate(['name' => 'Footer', 'slug' => 'blog_footer', 'content' => 'Make With Love']);
        Config::firstOrCreate(['name' => 'Twitter', 'slug' => 'social_twitter', 'content' => 'username']);
        Config::firstOrCreate(['name' => 'Linkdin', 'slug' => 'social_linkdin', 'content' => 'username']);
        Config::firstOrCreate(['name' => 'Github', 'slug' => 'social_github', 'content' => 'username']);
    }
}
