<?php
namespace Database\Seeders;

use App\Models\OurJourneyMain;
use Illuminate\Database\Seeder;

class OurJourneyMainSeeder extends Seeder
{
    public function run()
    {
        OurJourneyMain::create([
            'type' => 'BİZİM YOLCULUĞUMUZ',
            'title' => '1995-ci ildən bəri xidmətlərimizdən istifadə edən 1000+ Məmnun Müştəri Tərəfindən Etibar Edilir',
            'description' => 'Uzun müddət ərzində qəbul edilmiş bir həqiqətdir ki, bir oxucu səhifənin dizaynına baxarkən oxunaqlı məzmunla asanlıqla yayına bilər.',
        ]);
        
    }
}
