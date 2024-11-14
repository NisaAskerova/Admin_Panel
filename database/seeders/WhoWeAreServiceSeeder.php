<?php
namespace Database\Seeders;

use App\Models\WhoWeAreService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class WhoWeAreServiceSeeder extends Seeder
{
    public function run()
    {
        WhoWeAreService::create([
            'title' => 'High Quality Service',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/home.svg',  
            'color' => '#fee747',
        ]);

        WhoWeAreService::create([
            'title' => 'Modern System',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/system.svg',  
            'color' => '#FFF',
        ]);

        WhoWeAreService::create([
            'title' => '24/7 Customer Support',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/audio.svg',  
            'color' => '#FFF',
        ]);
        WhoWeAreService::create([
            'title' => '24/7 Customer Support',
            'description' => 'It is a long established fact that a reader will be distracted.',
            'icon' => 'icons/user.svg',  
            'color' => '#FFF',
        ]);
    }
}
