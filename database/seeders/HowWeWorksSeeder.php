<?php

namespace Database\Seeders;

use App\Models\HowWeWorksMain;
use App\Models\HowWeWorksService;
use Illuminate\Database\Seeder;

class HowWeWorksSeeder extends Seeder
{
    public function run()
    {
        // Seeder for HowWeWorksMain
        HowWeWorksMain::create([
            'type' => 'HOW WE WORKS',
            'main_title' => 'Our Service Process',
            'main_description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum..',
            'image' => 'images/howWeWork.png', 
        ]);
        HowWeWorksService::create([
            'title' => 'Choose Your Service',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/home2.svg', 
        ]);

        HowWeWorksService::create([
            'title' => 'Make An Appointment',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/calendarBig.svg',
        ]);

        HowWeWorksService::create([
            'title' => 'Development',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/ecommers.svg',
        ]);

        HowWeWorksService::create([
            'title' => 'Support',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/user.svg',
        ]);
    }
}
