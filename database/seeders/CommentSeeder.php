<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comment for blog ID 1 and user ID 3 (Leyla)
        Comment::create([
            'blog_id' => 1, 
            'user_id' => 3, 
            'name' => 'Leyla Hüseynova',
            'email' => 'leyla.huseynova@example.com',
            "comment" => "Bu məqalə, bulud təhlükəsizliyi ilə bağlı çətinlikləri geniş şəkildə izah edir. Mən bulud memarı kimi, uyğunluq məsələləri barədəki müzakirəni xüsusilə müvafiq hesab etdim. Müəllif yalnız riskləri müəyyənləşdirmək deyil, həm də praktik həllər təklif edir. Bu, bulud infrastrukturunu idarə edən hər kəs üçün mütləq oxunmalıdır."
        ]);

        // Comment for blog ID 2 and user ID 4 (Ramil)
        Comment::create([
            'blog_id' => 2, 
            'user_id' => 4, 
            'name' => 'Ramil Rzayev',
            'email' => 'ramil.rzayev@example.com',
            "comment" => "Bu məqalə çox maraqlı və məlumatlıdır! Mənim fikrimcə, bu mövzu ilə bağlı daha çox məqalə olmalıdır."
        ]);

        // Comment for blog ID 3 and user ID 5 (Aysel)
        Comment::create([
            'blog_id' => 3, 
            'user_id' => 5, 
            'name' => 'Aysel Məmmədova',
            'email' => 'aysel.mammadova@example.com',
            "comment" => "Bu mövzu haqqında daha çox praktiki misallar verilməsi faydalı olardı. Ümumiyyətlə, çox yaxşı yazılmışdır!"
        ]);

        // Comment for blog ID 4 and user ID 6 (Tural)
        Comment::create([
            'blog_id' => 4, 
            'user_id' => 6, 
            'name' => 'Tural Quliyev',
            'email' => 'tural.quliyev@example.com',
            "comment" => "Çox maraqlı məqalədir. Əlavə məlumatlarla daha zənginləşdirilə bilərdi."
        ]);

        // Comment for blog ID 5 and user ID 7 (Zeynəb)
        Comment::create([
            'blog_id' => 5, 
            'user_id' => 7, 
            'name' => 'Zeynəb Rəhmanova',
            'email' => 'zeynab.rahmanova@example.com',
            "comment" => "Bu mövzu haqqında bir çox fikirlərim var. Gələcəkdə daha dərin təhlillər verilə bilər."
        ]);

        // Comment for blog ID 6 and user ID 8 (Kamran)
        Comment::create([
            'blog_id' => 6, 
            'user_id' => 8, 
            'name' => 'Kamran Novruzov',
            'email' => 'kamran.novruzov@example.com',
            "comment" => "Çox maraqlı bir məqalədir, amma bəzi yerlərdə daha çox izah lazımdır."
        ]);

        // Comment for blog ID 7 and user ID 9 (Amina)
        Comment::create([
            'blog_id' => 7, 
            'user_id' => 9, 
            'name' => 'Amina Qurbanova',
            'email' => 'amina.qurbanova@example.com',
            "comment" => "Bu məqalə, daha geniş bir auditoriya üçün faydalı olardı. Məncə, bir neçə əlavə nümunə daxil edilə bilər."
        ]);

        // Comment for blog ID 8 and user ID 10 (Fariz)
        Comment::create([
            'blog_id' => 8, 
            'user_id' => 10, 
            'name' => 'Fariz Məmmədov',
            'email' => 'fariz.mammadov@example.com',
            "comment" => "Bu məqalə haqqında düşündüklərimi yazmaq istərdim. Əlavə resurslar və linklər verilsə, çox faydalı olardı."
        ]);

        // Comment for blog ID 9 and user ID 11 (Vüsal)
        Comment::create([
            'blog_id' => 9, 
            'user_id' => 11, 
            'name' => 'Vüsal İsmayılov',
            'email' => 'vusal.ismayilov@example.com',
            "comment" => "Bu mövzu haqqında daha çox məlumat gözləyirəm. Məqalənin sonunda bir neçə link olsa, oxucular üçün faydalı ola bilər."
        ]);

        // Comment for blog ID 10 and user ID 12 (Günay)
        Comment::create([
            'blog_id' => 9, 
            'user_id' => 12, 
            'name' => 'Günay Əliyeva',
            'email' => 'gunay.aliyeva@example.com',
            "comment" => "Bu yazı mənim üçün çox faydalı oldu. Gələcəkdə daha çox bu mövzuda yazılar gözləyirəm."
        ]);
        
    }
}
