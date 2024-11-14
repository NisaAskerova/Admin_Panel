<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    public function run()
    {
        Blog::create([
            'title' => 'When Do We Need to Hire A Bodyguard',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b1.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
        ]);

        Blog::create([
            'title' => 'Know Your Neighbour’s Behaviour By Using Cameras',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b2.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);

        Blog::create([
            'title' => 'What We Like About Our Bodyguard Service',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b3.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);
        Blog::create([
            'title' => 'Police and Security Guard News Podcast',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b4.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);
        Blog::create([
            'title' => 'The Best Cameras with IP and Presence Sensor',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b5.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);
        Blog::create([
            'title' => 'Private Security and New Methods Against Intrusions',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b6.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);
        Blog::create([
            'title' => 'A Wonderful Security has Taken Present Moment',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b7.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);
        Blog::create([
            'title' => 'Professional Team Member with Latest Equipment',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b8.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);
        Blog::create([
            'title' => 'Security Research than Get Better Protection',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'images/b9.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',

        ]);
    }
}
