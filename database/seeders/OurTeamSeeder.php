<?php

namespace Database\Seeders;

use App\Models\OurTeamMain;
use App\Models\OurTeamService;
use Illuminate\Database\Seeder;

class OurTeamSeeder extends Seeder
{
    public function run()
    {
        // Add data to the OurTeamMain model
        OurTeamMain::create([
            'type' => 'OUR Team',
            'title' => 'Meet Our Professional’s Team',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
        ]);
        // Add data to the OurTeamService model
        OurTeamService::create([
            'title' => 'Customer Support',
            'description' => 'We provide 24/7 customer support to help our clients with any inquiries or issues they may face.',
            'image' => 'images/ot1.png', // Add a dummy image URL or path
        ]);

        OurTeamService::create([
            'title' => 'Consulting Services',
            'description' => 'Our consulting team offers expert advice and services tailored to our clients’ needs and business goals.',
            'image' => 'images/ot2.png', // Add a dummy image URL or path
        ]);
        
        OurTeamService::create([
            'title' => 'Product Development',
            'description' => 'We help transform your ideas into innovative products through advanced technology and efficient workflows.',
            'image' => 'images/ot3.png', // Add a dummy image URL or path
        ]);
    }
}
