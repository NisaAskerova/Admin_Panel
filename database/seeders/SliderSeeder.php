<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            [
                'title' => 'Sizin Təhlükəsizliyiniz və Rahatlığınız Bizim Ən Önəmli Prioritetimizdir',
                'description' => 'Uzun müddət ərzində qəbul edilmiş bir həqiqətdir ki, bir oxucu səhifənin dizaynına baxarkən oxunaqlı məzmunla asanlıqla yayına bilər.',
                'image' => 'images/slideImage.png',
                'heroImage' => 'icons/yellowLine.svg',
                'backImage' => 'images/bs1.png',
                'icon' => 'icons/leftIcon.svg',
            ],
            [
                'title' => 'Gələcəyinizi Etibarlı Xidmətlərimizlə Təhlükəsizləşdirin',
                'description' => 'Komandamız, bütün müştərilərimizin təhlükəsizliyini və rahatlığını təmin etmək üçün istisnai xidmət göstərməyə həsr olunub.',
                'image' => 'images/slideImage.png',
                'heroImage' => 'icons/yellowLine.svg',
                'backImage' => 'images/bs2.png',
                'icon' => 'icons/leftIcon.svg',
            ],
            [
                'title' => 'Sizim Sülhünüz Üçün Təhlükəsizlikdə Mükəmməllik',
                'description' => 'İllərlə təcrübəyə sahibik və ən önəmlisini qorumaq üçün təhlükəsizlik və rahatlığı prioritet edirik.',
                'image' => 'images/slideImage.png',
                'heroImage' => 'icons/yellowLine.svg',
                'backImage' => 'images/bs3.png',
                'icon' => 'icons/leftIcon.svg',
            ],
        ];
        

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
