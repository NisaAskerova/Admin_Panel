<?php
namespace Database\Seeders;

use App\Models\OurJourneyMain;
use Illuminate\Database\Seeder;

class OurJourneyMainSeeder extends Seeder
{
    public function run()
    {
        OurJourneyMain::create([
            'type' => 'OUR JOURNEY',
            'title' => 'Trusted by 1000+ Happy Customers Who are Using Our Services Since 1995',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
        ]);
    }
}
