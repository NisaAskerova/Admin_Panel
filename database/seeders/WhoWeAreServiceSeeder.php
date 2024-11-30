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
            'title' => 'Yüksək Keyfiyyətli Xidmət',
            'description' => 'Yüksək keyfiyyətli təhlükəsizlik xidmətləri təqdim edirik.',
            'icon' => 'icons/home.svg',
            'color' => '#fee747',
        ]);
        
        WhoWeAreService::create([
            'title' => 'Müasir Sistemlər',
            'description' => 'Müasir sistemlərlə yüksək təhlükəsizlik təmin edirik.',
            'icon' => 'icons/system.svg',
            'color' => '#FFF',
        ]);
        
        WhoWeAreService::create([
            'title' => '24/7 Dəstək',
            'description' => 'Müştərilərimizə hər zaman, hər yerdə dəstək veririk.',
            'icon' => 'icons/audio.svg',
            'color' => '#FFF',
        ]);
        
        WhoWeAreService::create([
            'title' => 'Müştəri Dəstəyi',
            'description' => 'Təhlükəsizliklə bağlı suallarınızı cavablandırırıq.',
            'icon' => 'icons/user.svg',
            'color' => '#FFF',
        ]);
    }
}
