<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    public function run()
    {
        Blog::create([
            'title' => 'Hansı Zaman Bədən Mühafizəçisini İşə Cəlb Etməliyik',
            'description' => 'Bir oxucunun səhifənin tərtibatına baxarkən diqqətinin yayılacağı uzun müddətdir ki, məlum olan bir faktdır.',
            'image' => 'images/b1.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Bədən mühafizəçisi işə cəlb edərkən, təhlükəsizlik və qoruma üçün xüsusi ehtiyacların nəzərə alınması vacibdir. Bir çox hallarda, şəxsi təhlükəsizlik təhdidlərinə qarşı daha çox mühafizə təmin etmək məqsədilə bədən mühafizəçilərindən istifadə olunur. Təhlükəsizliyi təmin edən bədən mühafizəçiləri, hər bir müştərinin ehtiyaclarına uyğun şəkildə seçilməlidir.",
            "detail_short_description" => "Bədən mühafizəçisi işə cəlb edərkən, təhlükəsizlik və qoruma üçün xüsusi ehtiyacların nəzərə alınması vacibdir.",
            "detail_text" => "Bədən mühafizəçiləri, şəxsi təhlükəsizliyi qorumaq və müştərinin təhlükəsizlik risklərini minimuma endirmək məqsədilə təcrübəli və təlim keçmiş şəxslərdən ibarətdir.",
        ]);
        
        Blog::create([
            'title' => 'Kameralarla Qonşunuzun Davranışını Tanıyın',
            'description' => 'Bir oxucunun səhifənin tərtibatına baxarkən diqqətinin yayılacağı uzun müddətdir ki, məlum olan bir faktdır.',
            'image' => 'images/b2.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Kameralar, evlərin və mülkün təhlükəsizliyini təmin etmək üçün mükəmməl vasitələrdir. Bu texnologiya, qonşularınızın və mülkünüzün ətrafında baş verənləri izləmək və baş verən hər hansı şübhəli hadisələri dərhal aşkarlamaq üçün istifadə oluna bilər. Kamera sistemləri, həmçinin mülkün ətrafında baş verən hər hansı bir cinayət və ya təhlükəsizlik təhdidini önləmək üçün ideal bir vasitədir.",
            "detail_short_description" => "Kameralar, evlərin və mülkün təhlükəsizliyini təmin etmək üçün mükəmməl vasitələrdir.",
            "detail_text" => "Kamera sistemləri, həmçinin mülkün ətrafında baş verən hər hansı bir cinayət və ya təhlükəsizlik təhdidini önləmək üçün ideal bir vasitədir.",
        ]);
        
        Blog::create([
            'title' => 'Bədən Mühafizəçiliyimiz Haqqında Nə Bəyənirik',
            'description' => 'Bədən mühafizəçiliyinin əhəmiyyəti və işimizin müştərilər üçün necə faydalı olduğu barədə qısa məlumat.',
            'image' => 'images/b3.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Bizim bədən mühafizə xidməti yüksək keyfiyyətli təhlükəsizlik və şəxsiyyətyönlü yanaşmalarla tanınır. Mütəxəssislərimiz təcrübəli və peşəkardır, hər bir müştəriyə xüsusi diqqət yetirilir. Xidmətlərimiz müştərilərimizin təhlükəsizliyini təmin etməklə yanaşı, onların rahatlığını və rahatlığını da təmin edir.",
            "detail_short_description" => "Bizim bədən mühafizə xidmətimiz müştərilərimizin təhlükəsizliyini və rahatlığını ön planda tutaraq peşəkar yanaşma ilə təmin edilir.",
            "detail_text" => "Bədən mühafizəçiləri yüksək təhlükəsizlik təcrübəsinə malik və hər bir təhlükəsizlik hadisəsi ilə başa çıxmağa hazır olan təcrübəli şəxslərdir. Müştərilərimizin təcrübəsi bizim üçün önəmlidir və biz hər zaman müştəri məmnuniyyətini prioritet olaraq qəbul edirik. Təhlükəsizlik təcrübəsi olan peşəkar bədən mühafizəçilərimiz fərdi və ya qrup şəklində xidmət göstərə bilərlər.",
        ]);
        
        Blog::create([
            'title' => 'Polis və Təhlükəsizlik Keşikçisi Xəbərləri Podcastı',
            'description' => 'Polis və təhlükəsizlik sahəsindəki ən son xəbərlər və təhlillər, xidmətlərimizi necə təkmilləşdirə biləcəyimizi müzakirə edirik.',
            'image' => 'images/b4.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Polis və təhlükəsizlik sahəsindəki ən son inkişaflar barədə danışırıq. Bu podcastda təhlükəsizlik sahəsindəki yenilikləri, təcrübələri və müştəri tələblərinə cavab vermə yollarını müzakirə edirik.",
            "detail_short_description" => "Polis və təhlükəsizlik sahəsindəki ən son xəbərləri və təcrübələri bu podcastda paylaşırıq.",
            "detail_text" => "Bu podcastda biz polis və təhlükəsizlik sahəsindəki yeni tendensiyalar və inkişafları müzakirə edirik. Təhlükəsizlik xidmətləri ilə bağlı ən son xəbərləri dinləyicilərimizlə bölüşürük və bununla da müştərilərimizin daha təhlükəsiz hiss etmələrinə kömək edirik. Təhlükəsizlik sahəsindəki mütəxəssislərimizin fikirləri və təcrübələri podcastımıza xüsusi bir dəyər qatır.",
        ]);
        
        Blog::create([
            'title' => 'IP və Hərəkət Sensorlu Ən Yaxşı Kameralar',
            'description' => 'Ən yaxşı IP funksionallığı və hərəkət sensorları ilə təchiz olunmuş kameraları kəşf edin, təhlükəsizlik və izləmə üçün əvəzsizdir.',
            'image' => 'images/b5.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Bu günkü rəqəmsal dövrdə IP funksionallığı və hərəkət sensorları ilə təchiz olunmuş kameralar inkişaf etmiş təhlükəsizlik üçün vacibdir. Bu kameralar yalnız yüksək keyfiyyətli video təqdim etmir, həm də hərəkət aşkarlama funksiyasına malikdir, beləliklə hər hansı şübhəli fəaliyyət haqqında sizi xəbərdar edir. Ağıllı təhlükəsizlik sistemlərinə artan tələblə, bu kameralar ev və biznes təhlükəsizliyi üçün mükəmməl seçimdir, real vaxt rejimində izləmə, bulud yaddaşı və hətta uzaqdan nəzarət təklif edir.",
            "detail_short_description" => "IP funksionallığı və hərəkət sensorları ilə təchiz olunmuş kameralar yüksək keyfiyyətli video, hərəkət aşkarlama və real vaxt izləmə təklif edir, bu da onları inkişaf etmiş təhlükəsizlik üçün mükəmməl seçim edir.",
            "detail_text" => "Bu kameralar, hərəkət aşkarlama və dərhal bildiriş göndərmə qabiliyyətinə malik təhlükəsiz nəzarət təmin etmək üçün nəzərdə tutulub. Texnologiyanın inkişafı ilə, IP kameraları artıq ağıllı ev sistemlərinə inteqrasiya edilə bilər və bu da təhlükəsizlik təcrübəsini problemsiz edir. Evinizin qapısından tutmuş, iş yerlərinizə qədər izləmə aparmaq üçün bu kameralar, effektiv təhlükəsizlik üçün lazım olan etibarlılıq və aydınlıq təmin edir.",
        ]);
        
        Blog::create([
            'title' => 'Şəxsi Təhlükəsizlik və İstilanın Qarşısını Almaq Üçün Yeni Yöntəmlər',
            'description' => 'Şəxsi təhlükəsizlikdə yeni metodları və bunların şəxsi və peşəkar sahələrdə istillaların və təhdidlərin qarşısını necə aldığını araşdırın.',
            'image' => 'images/b6.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Şəxsi təhlükəsizlik hər zaman fərdləri və biznesləri potensial təhdidlərdən qorumaqda ön planda olub. Cinayət nisbətlərinin artması və təhlükəsizlik təhdidlərinin getdikcə daha mürəkkəbləşməsi ilə, təhlükəsizlik sistemlərinin effektivliyini artırmaq üçün yeni metodlar və texnologiyalar inkişaf etdirilir. İnkişaf etmiş müşahidə kameralarından ağıllı istintaq aşkar etmə sistemlərinə qədər, şəxsi təhlükəsizlik yeni çətinlikləri həll etmək üçün inkişaf edir. Son texnologiyaları tətbiq edərək, fərdlər və bizneslər, istillalar və digər risklərə qarşı yaxşı qorunduqlarını təmin edə bilərlər.",
            "detail_short_description" => "Şəxsi təhlükəsizlik yeni texnologiyalar və metodlarla daim inkişaf edir, istillaların qarşısını effektiv şəkildə almaq və əmlakları və fərdləri qorumaq üçün.",
            "detail_text" => "Şəxsi təhlükəsizlik texnologiyasındakı inkişaflar, istillaları baş verməzdən əvvəl aşkar edə bilən sistemlərin inkişafına səbəb olub. Ağıllı qapılar və biometrik giriş sistemlərindən tutmuş yeni metodlar, daha proaktiv qoruma təmin edir. Bu texnologiyalar real vaxt izləmə və sürətli cavab qabiliyyətləri təmin edərək, təhlükəsizlik personalının pozuntu baş verdikdə dərhal reaksiya verməsini təmin edir. Yüksək təhlükəsizlik həllərinə artan tələblə, şəxsi təhlükəsizliyin gələcəyi, qabaqcıl texnologiyaların və fərdi qoruma strategiyalarının birləşdirilməsindədir.",
        ]);
        
        Blog::create([
            'title' => 'Möhtəşəm Təhlükəsizlik Hazırkı Anı Qəbul Edib',
            'description' => 'Bu, uzun müddət ərzində qəbul edilmiş bir faktdır ki, bir oxucu səhifənin tərtibatına baxarkən oxunaqlı məzmundan yayına bilər.',
            'image' => 'images/b7.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Təhlükəsizlik sahəsindəki ən son yeniliklər müasir dövrün tələblərinə uyğun olaraq inkişaf edir. Bu sahədəki inkişaflar, həm fərdi, həm də korporativ müştərilər üçün müasir və güvənli həllər təqdim edir. Hər gün yenilənən texnologiyalar, təhlükəsizlik məsələlərinə yeni yanaşmalar təqdim edir. Bu blogda siz ən son təhlükəsizlik tədqiqatları və onların necə daha güvənli qoruma təmin etdiyini öyrənəcəksiniz.",
            "detail_short_description" => "Bu, uzun müddət ərzində qəbul edilmiş bir faktdır ki, bir oxucu səhifənin tərtibatına baxarkən oxunaqlı məzmundan yayına bilər. Təhlükəsizlik sahəsindəki ən son yeniliklər müasir dövrün tələblərinə uyğun olaraq inkişaf edir.",
            "detail_text" => "Texnologiyaların sürətli inkişafı ilə təhlükəsizlik sektorunda yeni yanaşmalar və həllər təqdim edilir. Bu blogda bu yeniliklər və onların istifadəsi haqqında daha çox məlumat tapacaqsınız.",
        ]);
        
        Blog::create([
            'title' => 'Peşəkar Komanda Üzvü Ən Son Avadanlıqlarla',
            'description' => 'Bu, uzun müddət ərzində qəbul edilmiş bir faktdır ki, bir oxucu səhifənin tərtibatına baxarkən oxunaqlı məzmundan yayına bilər.',
            'image' => 'images/b8.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Peşəkar komanda üzvləri ən müasir avadanlıqlarla işləyərək ən yüksək təhlükəsizlik standartlarını təmin edirlər. Təhlükəsizlik tədbirləri, ən son texnologiyalarla birləşərək, daha etibarlı mühitlər yaratmağa imkan verir. Bu blogda biz peşəkar komanda üzvlərinin istifadə etdiyi avadanlıqların gücündən bəhs edəcəyik.",
            "detail_short_description" => "Peşəkar komanda üzvləri ən müasir avadanlıqlarla işləyərək ən yüksək təhlükəsizlik standartlarını təmin edirlər. Bu, uzun müddət ərzində qəbul edilmiş bir faktdır ki, bir oxucu səhifənin tərtibatına baxarkən oxunaqlı məzmundan yayına bilər.",
            "detail_text" => "İnnovativ avadanlıqlar və texnologiyalar sayəsində komandalar, riskləri daha effektiv idarə edərək təhlükəsizliyi artırırlar. Bu bloqda bu yeniliklər və onların faydaları haqqında daha çox məlumat tapa bilərsiniz.",
        ]);
        
        Blog::create([
            'title' => 'Təhlükəsizlik Araşdırması ilə Daha Yaxşı Qoruma əldə Edin',
            'description' => 'Bu, uzun müddət ərzində qəbul edilmiş bir faktdır ki, bir oxucu səhifənin tərtibatına baxarkən oxunaqlı məzmundan yayına bilər.',
            'image' => 'images/b9.png',
            'date_icon' => 'icons/calendar.svg',
            'button_icon' => 'icons/leftIcon.svg',
            "detail_description" => "Təhlükəsizlik sahəsində aparılan tədqiqatlar, daha güvənli qoruma üçün yeni üsullar təqdim edir. Bu sahədəki inkişaflar, həm fərdi, həm də korporativ müştərilər üçün daha effektiv qoruma təmin edir. Bu blogda, təhlükəsizlik sahəsindəki tədqiqatlar və onların necə qorumağı daha yaxşı hala gətirdiyini öyrənəcəksiniz.",
            "detail_short_description" => "Təhlükəsizlik sahəsindəki tədqiqatlar, daha güvənli qoruma üçün yeni üsullar təqdim edir. Bu, uzun müddət ərzində qəbul edilmiş bir faktdır ki, bir oxucu səhifənin tərtibatına baxarkən oxunaqlı məzmundan yayına bilər.",
            "detail_text" => "Ən son təhlükəsizlik tədqiqatları, müxtəlif qoruma üsullarını inkişaf etdirərək daha yaxşı nəticələr əldə etməyə imkan verir. Bu bloqda bu yeni yanaşmalar haqqında daha çox məlumat tapacaqsınız.",
        ]);
        
    }
}
