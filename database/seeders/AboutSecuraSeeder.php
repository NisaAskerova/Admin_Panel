<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSecura;

class AboutSecuraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutSecura::create([
            'type' => 'SECURA HAQQINDA',
            'title' => 'Müştərilərə Yüksək Səviyyəli Müdafiə Təmin Edin',
            'description' => 'Biz, müştərilərimizin təhlükəsizliyini və məlumatlarının qorunmasını ön planda tutaraq, yüksək səviyyəli qoruma xidmətləri təqdim edirik. Secura, uzun müddətlik təcrübəsi ilə müştərilərinə ən etibarlı və effektiv müdafiə təklif edir.',
            'image' => 'images/abutSecura.png',
            'icon' => 'icons/leftIcon.svg',
        ]);
        
    }
}
