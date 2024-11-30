<?php
namespace Database\Seeders;

use App\Models\OurJourneyCounter;
use Illuminate\Database\Seeder;

class OurJourneyCounterSeeder extends Seeder
{
    public function run()
    {
        OurJourneyCounter::create([
            'title' => 'Peşəkarlarımız',
            'count' => 150,
        ]);
        
        OurJourneyCounter::create([
            'title' => 'Tamamlanan Layihələr',
            'count' => 850,
        ]);
        
        OurJourneyCounter::create([
            'title' => 'Məmnun Müştərilər',
            'count' => 1000,
        ]);
        
        OurJourneyCounter::create([
            'title' => 'Qazanılan Mükafatlar',
            'count' => 30,
        ]);
        
    }
}
