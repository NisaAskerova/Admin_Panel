<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OurVisionMain;
use App\Models\OurVisionService;

class OurVisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for the 'OurVisionMain' table
        OurVisionMain::create([
            'type' => 'OUR VISION/MISSION',
            'title' => 'We Are Agile, Confidential & Trained',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.',
            'image' => 'images/ourVision.png',  // Assuming the image is already stored in the public folder
        ]);



        // Sample data for the 'OurVisionService' table
        OurVisionService::create([
            'title' => 'Trained Agents',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/users.svg',  // Assuming the icon is already stored in the public folder
        ]);

        OurVisionService::create([
            'title' => 'Quality Products',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/box.svg',  // Assuming the icon is already stored in the public folder
        ]);

        OurVisionService::create([
            'title' => '24/7 Customer Support',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/multimedia.svg',  // Assuming the icon is already stored in the public folder
        ]);
    }
}
