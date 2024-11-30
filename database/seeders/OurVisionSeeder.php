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
      
        OurVisionMain::create([
            'type' => 'BİZİM VİZYONUMUZ/MİSSİYAMIZ',
            'title' => 'Çevik, Gizli və Təlimliyk',
            'description' => 'Uzun müddət ərzində qəbul edilmiş bir həqiqətdir ki, bir oxucu səhifənin dizaynına baxarkən oxunaqlı məzmunla asanlıqla yayına bilər. Lorem Ipsum istifadə etməyin məqsədi budur.',
            'image' => 'images/ourVision.png',  
        ]);
        
        OurVisionService::create([
            'title' => 'Təlimli Agentlər',
            'description' => 'Uzun müddət ərzində qəbul edilmiş bir həqiqətdir ki, bir oxucu səhifənin dizaynına baxarkən asanlıqla yayına bilər.',
            'icon' => 'icons/users.svg', 
        ]);
        
        OurVisionService::create([
            'title' => 'Keyfiyyətli Məhsullar',
            'description' => 'Biz müştərilərimizə yüksək keyfiyyətli məhsullar təqdim edirik ki, bu da onların ehtiyaclarını tam ödəyir.',
            'icon' => 'icons/box.svg', 
        ]);
        
        OurVisionService::create([
            'title' => '24/7 Müştəri Dəstəyi',
            'description' => 'Biz müştərilərimizin hər bir sualına və ehtiyacına cavab vermək üçün 24/7 xidmət göstəririk.',
            'icon' => 'icons/multimedia.svg', 
        ]);
        
    }
}
