<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogMain;

class BlogMainSeeder extends Seeder
{
    public function run()
    {
        BlogMain::create([
            'type' => 'BLOQUMUZ',
            'title' => 'Son Bloqlarımız',
            'description' => 'Bizim bloqlarımızda müştərilərimizə faydalı məlumatlar, təcrübələr və tövsiyələr təqdim edirik. Ən son yeniliklər və mövzular haqqında məlumatları burada tapa bilərsiniz.',
        ]);
        
    }
}
