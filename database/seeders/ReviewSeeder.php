<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Transaction istifadə edirik ki, həm Review, həm də Rating eyni vaxtda əlavə olunsun
        DB::transaction(function () {
            // Product 1 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 3,
                'product_id' => 1,
                'review_comment' => "Bu məhsul çox faydalıdır. Keyfiyyətli və istifadə edilməsi asandır.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 1,
                'user_id' => 3,
                'rating' => 4, // Rating qiyməti (1-5)
            ]);

            // Product 2 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 4,
                'product_id' => 2,
                'review_comment' => "Məhsulun keyfiyyəti gözlədiyimdən aşağıdır. Ümumi təcrübə mənfi oldu.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 2,
                'user_id' => 4,
                'rating' => 2, // Rating qiyməti (1-5)
            ]);

            // Product 3 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 5,
                'product_id' => 3,
                'review_comment' => "Məhsulun dizaynı çox şıxdır, amma funksional deyil. Təkmilləşdirilməli.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 3,
                'user_id' => 5,
                'rating' => 3, // Rating qiyməti (1-5)
            ]);

            // Product 4 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 6,
                'product_id' => 4,
                'review_comment' => "Məhsul çox yaxşıdır, istifadə etmək çox rahatdır. Mənim gözləntilərimi tam qarşılayır.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 4,
                'user_id' => 6,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);

            // Product 5 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 7,
                'product_id' => 5,
                'review_comment' => "Məhsul gözlədiyim kimi işləmir. Keyfiyyət məsələsində ciddi problemlər var.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 5,
                'user_id' => 7,
                'rating' => 1, // Rating qiyməti (1-5)
            ]);

            // Product 6 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 8,
                'product_id' => 6,
                'review_comment' => "Çox keyfiyyətli məhsuldur, tamamilə tövsiyə edirəm.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 6,
                'user_id' => 8,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);

            // Product 7 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 9,
                'product_id' => 7,
                'review_comment' => "Bəzi funksiyalar gözlədiyimdən daha yaxşıdır, amma məhsul çox bahadır.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 7,
                'user_id' => 9,
                'rating' => 3, // Rating qiyməti (1-5)
            ]);

            // Product 8 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 10,
                'product_id' => 8,
                'review_comment' => "Çox mükəmməl bir məhsul. Çox funksionaldır və uzun müddət istifadə etmək mümkündür.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 8,
                'user_id' => 10,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);

            // Product 9 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 11,
                'product_id' => 9,
                'review_comment' => "Məhsul qiymətinə görə çox yaxşıdır. Qısa müddətdə istifadə edə bilərsiniz.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 9,
                'user_id' => 11,
                'rating' => 4, // Rating qiyməti (1-5)
            ]);

            // Product 10 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 12,
                'product_id' => 10,
                'review_comment' => "Məhsul çox yüksək keyfiyyətə malikdir və hər kəsə tövsiyə edirəm.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 10,
                'user_id' => 12,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);

            // Product 11 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 13,
                'product_id' => 11,
                'review_comment' => "İstifadə etmək asandır və performans çox yaxşıdır. Amma qiyməti yüksəkdir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 11,
                'user_id' => 13,
                'rating' => 4, // Rating qiyməti (1-5)
            ]);

            // Product 12 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 14,
                'product_id' => 12,
                'review_comment' => "Çox sərfəli qiymətə əla məhsuldur. Hər kəsə tövsiyə edirəm.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 12,
                'user_id' => 14,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);
            Review::create([
                'user_id' => 15, // Təkrarlanan istifadəçi ID-ləri
                'product_id' => 13,
                'review_comment' => "Məhsul keyfiyyətlidir, lakin çatdırılma gecikdi. Bu məni narahat etdi.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 13,
                'user_id' => 15,
                'rating' => 3, // Rating qiyməti (1-5)
            ]);

            // Product 14 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 2,
                'product_id' => 14,
                'review_comment' => "Bütün gözləntilərimi qarşıladı. Müasir və praktiki bir məhsuldur.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 14,
                'user_id' => 2,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);

            // Product 15 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 3,
                'product_id' => 15,
                'review_comment' => "Material keyfiyyəti yaxşı deyil. Daha yaxşısını gözləyirdim.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 15,
                'user_id' => 3,
                'rating' => 2, // Rating qiyməti (1-5)
            ]);

            // Product 16 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 4,
                'product_id' => 16,
                'review_comment' => "Bu məhsul çox sadədir və istənilən məqsədə uyğun gəlir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 16,
                'user_id' => 4,
                'rating' => 4, // Rating qiyməti (1-5)
            ]);

            // Product 17 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 5,
                'product_id' => 17,
                'review_comment' => "Məhsul çox pis qablaşdırılmışdı. Keyfiyyət yaxşıdır, amma detallara diqqət yetirilməlidir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 17,
                'user_id' => 5,
                'rating' => 3, // Rating qiyməti (1-5)
            ]);

            // Product 18 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 6,
                'product_id' => 18,
                'review_comment' => "İstifadə etmək asandır və qiymət çox münasibdir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 18,
                'user_id' => 6,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);

            // Product 19 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 7,
                'product_id' => 19,
                'review_comment' => "Məhsul çox funksionaldır, amma bəzi detallar inkişaf etdirilməlidir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 19,
                'user_id' => 7,
                'rating' => 4, // Rating qiyməti (1-5)
            ]);

            // Product 20 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 8,
                'product_id' => 20,
                'review_comment' => "Çox gözəl dizayn, lakin texniki dəstək zəifdir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 20,
                'user_id' => 8,
                'rating' => 3, // Rating qiyməti (1-5)
            ]);

            // Product 21 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 9,
                'product_id' => 21,
                'review_comment' => "Məhsul çox yüksək keyfiyyətlidir. Mənə hər şeydən çox razı qaldım.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 21,
                'user_id' => 9,
                'rating' => 5, // Rating qiyməti (1-5)
            ]);

            // Product 22 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 10,
                'product_id' => 22,
                'review_comment' => "İstifadəsi çox rahatdır, amma qiymət bir az yüksəkdir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 22,
                'user_id' => 10,
                'rating' => 4, // Rating qiyməti (1-5)
            ]);
            Review::create([
                'user_id' => 11,
                'product_id' => 23,
                'review_comment' => "Məhsul çox rahatdır, lakin bəzən performansı azaldır.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 23,
                'user_id' => 11,
                'rating' => 3,
            ]);

            // Product 24 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 12,
                'product_id' => 24,
                'review_comment' => "Hər bir detal çox diqqətlə hazırlanmışdır. Çox məmnunam.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 24,
                'user_id' => 12,
                'rating' => 5,
            ]);

            // Product 25 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 13,
                'product_id' => 25,
                'review_comment' => "Dizayn yaxşıdır, amma çatdırılma gecikdi.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 25,
                'user_id' => 13,
                'rating' => 4,
            ]);

            // Product 26 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 14,
                'product_id' => 26,
                'review_comment' => "Məhsulun keyfiyyəti yüksəkdir, lakin qiymət bahadır.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 26,
                'user_id' => 14,
                'rating' => 4,
            ]);

            // Product 27 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 15,
                'product_id' => 27,
                'review_comment' => "Hər gün istifadə edirəm, çox praktiki bir məhsuldur.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 27,
                'user_id' => 15,
                'rating' => 5,
            ]);

            // Product 28 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 1,
                'product_id' => 28,
                'review_comment' => "Performans çox aşağıdır, gözləntilərimi qarşılamadı.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 28,
                'user_id' => 1,
                'rating' => 2,
            ]);

            // Product 29 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 2,
                'product_id' => 29,
                'review_comment' => "Dizayn çox xoşuma gəldi, istifadəsi də çox rahatdır.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 29,
                'user_id' => 2,
                'rating' => 5,
            ]);

            // Product 30 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 3,
                'product_id' => 30,
                'review_comment' => "Qiymət performansa uyğun deyil.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 30,
                'user_id' => 3,
                'rating' => 3,
            ]);

            // Product 31 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 4,
                'product_id' => 31,
                'review_comment' => "Çox yüksək keyfiyyətlidir və uzunömürlüdür.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 31,
                'user_id' => 4,
                'rating' => 5,
            ]);

            // Product 32 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 5,
                'product_id' => 32,
                'review_comment' => "Məhsul gözəl qablaşdırılmışdı və keyfiyyətlidir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 32,
                'user_id' => 5,
                'rating' => 5,
            ]);

            // Product 33 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 6,
                'product_id' => 33,
                'review_comment' => "İstifadə asandır, lakin bəzən performans problemləri olur.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 33,
                'user_id' => 6,
                'rating' => 3,
            ]);

            // Product 34 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 7,
                'product_id' => 34,
                'review_comment' => "Çox faydalıdır, qiymət də münasibdir.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 34,
                'user_id' => 7,
                'rating' => 4,
            ]);

            // Product 35 üçün Review və Rating əlavə et
            Review::create([
                'user_id' => 8,
                'product_id' => 35,
                'review_comment' => "Məhsul gözləntilərimi üstələdi.",
                'review_date' => now(),
            ]);

            Rating::create([
                'product_id' => 35,
                'user_id' => 8,
                'rating' => 5,
            ]);
        });
    }
}
