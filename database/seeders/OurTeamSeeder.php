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
            'type' => 'BİZİM KOMANDAMIZ',
            'title' => 'Peşəkar Komandamızla Tanış Olun',
            'description' => 'Uzun müddət ərzində qəbul edilmiş bir həqiqətdir ki, bir oxucu səhifənin dizaynına baxarkən oxunaqlı məzmunla asanlıqla yayına bilər.',
        ]);
        
        // Add data to the OurTeamService model
        OurTeamService::create([
            'title' => 'Müştəri Dəstəyi',
            'description' => 'Müştərilərimizin qarşılaşdıqları hər hansı suallar və ya problemlərlə bağlı onlara 24/7 dəstək veririk.',
            'image' => 'images/ot1.png', // Dummy image URL or path
        ]);
        
        OurTeamService::create([
            'title' => 'Konsultasiya Xidmətləri',
            'description' => 'Konsultasiya komandamız müştərilərimizin ehtiyaclarına və biznes məqsədlərinə uyğun ekspert məsləhətləri və xidmətləri təqdim edir.',
            'image' => 'images/ot2.png', // Dummy image URL or path
        ]);
        
        OurTeamService::create([
            'title' => 'Məhsul İnkişafı',
            'description' => 'Biz, fikirlərinizi yenilikçi məhsullara çevirmək üçün qabaqcıl texnologiyalar və effektiv iş axınlarından istifadə edirik.',
            'image' => 'images/ot3.png', // Dummy image URL or path
        ]);
        
    }
}
