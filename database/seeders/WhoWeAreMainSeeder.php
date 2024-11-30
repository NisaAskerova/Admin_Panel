<?php
namespace Database\Seeders;

use App\Models\WhoWeAreMain;
use Illuminate\Database\Seeder;

class WhoWeAreMainSeeder extends Seeder
{
    public function run()
    {
        WhoWeAreMain::create([
            'type' => 'BİZ KİMİK',
            'main_title' => 'Polis İcazəsi ilə Özəl Təhlükəsizlik Xidməti Təqdim Edirik',
            'main_description' => 'Bizim uzun müddət davam edən xidmətlərimiz göstərir ki, müştərilərimiz bizə güvənirlər. Təhlükəsizlik sahəsindəki təcrübəmiz sayəsində yüksək keyfiyyətli xidmətlər təqdim edirik.',
            'image' => 'images/whoweare.png',
        ]);
    }
}
