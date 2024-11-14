<?php
namespace Database\Seeders;

use App\Models\OurJourneyCounter;
use Illuminate\Database\Seeder;

class OurJourneyCounterSeeder extends Seeder
{
    public function run()
    {
        OurJourneyCounter::create([
            'title' => 'Our Professional',
            'count' => 150,
        ]);

        OurJourneyCounter::create([
            'title' => 'Projects Completed',
            'count' => 850,
        ]);

        OurJourneyCounter::create([
            'title' => 'Satisfied Clients',
            'count' => 1000,
        ]);
        OurJourneyCounter::create([
            'title' => 'Award Achieved',
            'count' => 30,
        ]);
    }
}
