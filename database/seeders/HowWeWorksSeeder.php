<?php

namespace Database\Seeders;

use App\Models\HowWeWorksMain;
use App\Models\HowWeWorksService;
use Illuminate\Database\Seeder;

class HowWeWorksSeeder extends Seeder
{
    public function run()
    {
        // Seeder for HowWeWorksMain
        HowWeWorksMain::create([
            'type' => 'NECƏ İŞLƏYİRİK',
            'main_title' => 'Xidmət Prosesimiz',
            'main_description' => 'Bizim xidmət prosesimiz, müştərilərə keyfiyyətli və sürətli xidmət göstərmək üçün uzun illər boyu inkişaf etdirilən bir sistemdir. Bütün addımlar diqqətlə nəzərdən keçirilir və müştəri məmnuniyyəti ön planda saxlanılır.',
            'image' => 'images/howWeWork.png', 
        ]);
        
        HowWeWorksService::create([
            'title' => 'Xidmətinizi Seçin',
            'description' => 'İlk addım olaraq, ehtiyaclarınıza uyğun xidmət növünü seçin. Bu seçim sizə ən uyğun həlli tapmağa kömək edəcək.',
            'icon' => 'icons/home2.svg', 
        ]);
        
        HowWeWorksService::create([
            'title' => 'Təyinat Edin',
            'description' => 'Siz xidmətimizi seçdikdən sonra, təyin olunan vaxtda görüş təyin edə bilərsiniz. Bu, daha sonra prosesin daha rahat və sürətli irəliləməsini təmin edəcək.',
            'icon' => 'icons/calendarBig.svg',
        ]);
        
        HowWeWorksService::create([
            'title' => 'İnkişaf',
            'description' => 'Xidmətimizə başlandıqdan sonra, müvafiq inkişaf mərhələlərinə keçirik. Hər bir mərhələdə, müştərinin tələblərinə uyğun dəyişikliklər ediləcək.',
            'icon' => 'icons/ecommers.svg',
        ]);
        
        HowWeWorksService::create([
            'title' => 'Dəstək',
            'description' => 'İşlər tamamlandıqdan sonra, müştərilərimizə dəstək göstərilməkdədir. Suallarınız və ya hər hansı bir məsələ ilə bağlı yardım üçün bizə müraciət edə bilərsiniz.',
            'icon' => 'icons/user.svg',
        ]);
        
    }
}
