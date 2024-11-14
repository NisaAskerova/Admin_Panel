<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogMain;

class BlogMainSeeder extends Seeder
{
    public function run()
    {
        BlogMain::create([
            'type' => 'OUR BLOG',
            'title' => 'Our Latest Blogs',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.',
        ]);
    }
}
