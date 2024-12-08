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
        // Using transaction to ensure both Review and Rating are added together
        DB::transaction(function () {
            // Product 1: Review and Rating
            $review1 = Review::create([
                'user_id' => 3,
                'product_id' => 1,
                'review_comment' => "Bu məhsul çox faydalıdır. Yüksək keyfiyyətə malikdir və istifadəsi asandır",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 1,
                'user_id' => 3,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review1->id, // Linking Rating to Review
            ]);

            // Product 2: Review and Rating
            $review2 = Review::create([
                'user_id' => 4,
                'product_id' => 2,
                'review_comment' => "Məhsulun keyfiyyəti gözləniləndən aşağıdır. Ümumilikdə təcrübə mənfi oldu",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 2,
                'user_id' => 4,
                'rating' => 2, // Rating (1-5)
                'review_id' => $review2->id, // Linking Rating to Review
            ]);

            // Product 3: Review and Rating
            $review3 = Review::create([
                'user_id' => 5,
                'product_id' => 3,
                'review_comment' => "Dizayn çox şıxdır, amma funksional deyil. Təkmilləşdirməyə ehtiyacı var.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 3,
                'user_id' => 5,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review3->id, // Linking Rating to Review
            ]);

            // Product 4: Review and Rating
            $review4 = Review::create([
                'user_id' => 6,
                'product_id' => 4,
                'review_comment' => "Məhsul mükəmməldir, istifadəsi asandır və gözləntilərimi qarşılayır",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 4,
                'user_id' => 6,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review4->id, // Linking Rating to Review
            ]);

            // Product 5: Review and Rating
            $review5 = Review::create([
                'user_id' => 7,
                'product_id' => 5,
                'review_comment' => "Məhsul gözlədiyim kimi işləməyib. Böyük keyfiyyət problemləri mövcuddur.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 5,
                'user_id' => 7,
                'rating' => 1, // Rating (1-5)
                'review_id' => $review5->id, // Linking Rating to Review
            ]);

            // Product 6: Review and Rating
            $review6 = Review::create([
                'user_id' => 8,
                'product_id' => 6,
                'review_comment' => "Çox yüksək keyfiyyətli məhsuldur, tamamilə tövsiyə edirəm.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 6,
                'user_id' => 8,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review6->id, // Linking Rating to Review
            ]);

            // Continue similarly for remaining products

            // Example for Product 7 and 8:
            $review7 = Review::create([
                'user_id' => 9,
                'product_id' => 7,
                'review_comment' => "Bəzi xüsusiyyətlər gözlədiyimdən yaxşıdır, amma məhsul çox bahadır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 7,
                'user_id' => 9,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review7->id, // Linking Rating to Review
            ]);

            $review8 = Review::create([
                'user_id' => 10,
                'product_id' => 8,
                'review_comment' => "Mükəmməl məhsuldur. Çox funksional və uzunmüddətli istifadə üçün uyğundur.",
                'review_date' => now(),
            ]);
            // Product 9: Review və Rating
            $review9 = Review::create([
                'user_id' => 11,
                'product_id' => 9,
                'review_comment' => "Məhsul yaxşıdır, amma qiyməti bir az yüksəkdir. Yine də dəyər.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 9,
                'user_id' => 11,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review9->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 10: Review və Rating
            $review10 = Review::create([
                'user_id' => 12,
                'product_id' => 10,
                'review_comment' => "Çox funksional və yüksək keyfiyyətli bir məhsuldur. Təqdimatı çox yaxşıdır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 10,
                'user_id' => 12,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review10->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 11: Review və Rating
            $review11 = Review::create([
                'user_id' => 13,
                'product_id' => 11,
                'review_comment' => "Ümumi təcrübə yaxşıdır, amma kiçik problemlər var. Məhsulun işləmə müddəti daha uzun ola bilərdi.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 11,
                'user_id' => 13,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review11->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 12: Review və Rating
            $review12 = Review::create([
                'user_id' => 14,
                'product_id' => 12,
                'review_comment' => "Bu məhsulu çox bəyəndim. Fərqli və çox şıkdır. Tövsiyə edirəm.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 12,
                'user_id' => 14,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review12->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 13: Review və Rating
            $review13 = Review::create([
                'user_id' => 15,
                'product_id' => 13,
                'review_comment' => "Məhsul çox yaxşıdır, amma qiymət biraz yüksəkdir. Ümumilikdə məmnun oldum.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 13,
                'user_id' => 15,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review13->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 14: Review və Rating
            $review14 = Review::create([
                'user_id' => 2,
                'product_id' => 14,
                'review_comment' => "Məhsul yaxşı işləyir, amma kiçik qüsurları var. Hələ də qiymətinə görə yaxşıdır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 14,
                'user_id' => 2,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review14->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 15: Review və Rating
            $review15 = Review::create([
                'user_id' => 3,
                'product_id' => 15,
                'review_comment' => "Çox yaxşı məhsuldur, amma daha güclü ola bilərdi. Ümumilikdə yaxşıdır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 15,
                'user_id' => 3,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review15->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 16: Review və Rating
            $review16 = Review::create([
                'user_id' => 3,
                'product_id' => 16,
                'review_comment' => "Məhsul çox funksionallıdır və çox işə yarayır. Rəng seçimi də çox gözəldir.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 16,
                'user_id' => 3,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review16->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 17: Review və Rating
            $review17 = Review::create([
                'user_id' => 4,
                'product_id' => 17,
                'review_comment' => "Qiymətə dəyər, amma daha az işləyir. Fiyatına görə ortadır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 17,
                'user_id' => 4,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review17->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 18: Review və Rating
            $review18 = Review::create([
                'user_id' => 5,
                'product_id' => 18,
                'review_comment' => "Çox rahat və istifadə etmək asandır. Dəyərinə görə çox yaxşıdır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 18,
                'user_id' => 5,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review18->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 19: Review və Rating
            $review19 = Review::create([
                'user_id' => 6,
                'product_id' => 19,
                'review_comment' => "Məhsul yaxşıdır, amma qiyməti bir az yüksəkdir.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 19,
                'user_id' => 6,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review19->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);

            // Product 20: Review və Rating
            $review20 = Review::create([
                'user_id' => 7,
                'product_id' => 20,
                'review_comment' => "Bu məhsuldan çox məmnun qaldım. Hər cəhətdən gözəl və keyfiyyətli.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 20,
                'user_id' => 7,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review20->id, // Şərhi qiymətləndirməyə bağlamaq
            ]);


            // Product 21: Review and Rating
            $review21 = Review::create([
                'user_id' => 2,
                'product_id' => 21,
                'review_comment' => "Bu məhsul mənim gözlədiyimdən çox daha yaxşıdır, çox məmnunam.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 21,
                'user_id' => 2,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review21->id, // Linking Rating to Review
            ]);

            // Product 22: Review and Rating
            $review22 = Review::create([
                'user_id' => 2,
                'product_id' => 22,
                'review_comment' => "Qiymət/keyfiyyət nisbəti çox yaxşıdır, lakin məhsulun ölçüsü çox böyükdür.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 22,
                'user_id' => 2,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review22->id, // Linking Rating to Review
            ]);

            // Product 23: Review and Rating
            $review23 = Review::create([
                'user_id' => 3,
                'product_id' => 23,
                'review_comment' => "Ümumilikdə yaxşıdır, amma məhsulun istifadəsi çox çətin olur.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 23,
                'user_id' => 3,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review23->id, // Linking Rating to Review
            ]);

            // Product 24: Review and Rating
            $review24 = Review::create([
                'user_id' => 4,
                'product_id' => 24,
                'review_comment' => "Çox yaxşı məhsul, amma qablaşdırma çox zəifdir.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 24,
                'user_id' => 4,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review24->id, // Linking Rating to Review
            ]);

            // Product 25: Review and Rating
            $review25 = Review::create([
                'user_id' => 5,
                'product_id' => 25,
                'review_comment' => "Əla məhsuldur, amma çox yavaş işləyir.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 25,
                'user_id' => 5,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review25->id, // Linking Rating to Review
            ]);

            // Product 26: Review and Rating
            $review26 = Review::create([
                'user_id' => 6,
                'product_id' => 26,
                'review_comment' => "Həqiqətən keyfiyyətli bir məhsuldur, çox məmnunam.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 26,
                'user_id' => 6,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review26->id, // Linking Rating to Review
            ]);

            // Product 27: Review and Rating
            $review27 = Review::create([
                'user_id' => 7,
                'product_id' => 27,
                'review_comment' => "Həm funksional, həm də gözəl dizaynı var. Çox bəyəndim.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 27,
                'user_id' => 7,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review27->id, // Linking Rating to Review
            ]);

            // Product 28: Review and Rating
            $review28 = Review::create([
                'user_id' => 8,
                'product_id' => 28,
                'review_comment' => "Bu məhsul gözlədiyimdən daha pisdir. Sifarişimi geri qaytarıram.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 28,
                'user_id' => 8,
                'rating' => 1, // Rating (1-5)
                'review_id' => $review28->id, // Linking Rating to Review
            ]);

            // Product 29: Review and Rating
            $review29 = Review::create([
                'user_id' => 9,
                'product_id' => 29,
                'review_comment' => "Çox yaxşı işləyir, lakin qiyməti çox bahadır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 29,
                'user_id' => 9,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review29->id, // Linking Rating to Review
            ]);

            // Product 30: Review and Rating
            $review30 = Review::create([
                'user_id' => 10,
                'product_id' => 30,
                'review_comment' => "Çox yüksək keyfiyyətə malikdir. İstifadə rahatdır.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 30,
                'user_id' => 10,
                'rating' => 5, // Rating (1-5)
                'review_id' => $review30->id, // Linking Rating to Review
            ]);

            // Product 31: Review and Rating
            $review31 = Review::create([
                'user_id' => 11,
                'product_id' => 31,
                'review_comment' => "Məhsul çox yaxşıdır, amma bir neçə gündən sonra qırıldı.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 31,
                'user_id' => 11,
                'rating' => 2, // Rating (1-5)
                'review_id' => $review31->id, // Linking Rating to Review
            ]);

            // Product 32: Review and Rating
            $review32 = Review::create([
                'user_id' => 12,
                'product_id' => 32,
                'review_comment' => "Məhsul ümumiyyətlə yaxşıdır, amma texniki problemlər var.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 32,
                'user_id' => 12,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review32->id, // Linking Rating to Review
            ]);

            // Product 33: Review and Rating
            $review33 = Review::create([
                'user_id' => 13,
                'product_id' => 33,
                'review_comment' => "Çox sadə və praktik məhsuldur, amma bir az daha ucuz ola bilər.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 33,
                'user_id' => 13,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review33->id, // Linking Rating to Review
            ]);

            // Product 34: Review and Rating
            $review34 = Review::create([
                'user_id' => 14,
                'product_id' => 34,
                'review_comment' => "Məhsul gözlədiyim kimi deyil, amma yenə də işimi görür.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 34,
                'user_id' => 14,
                'rating' => 3, // Rating (1-5)
                'review_id' => $review34->id, // Linking Rating to Review
            ]);

            // Product 35: Review and Rating
            $review35 = Review::create([
                'user_id' => 15,
                'product_id' => 35,
                'review_comment' => "Bu məhsul çox yaxşıdır, amma işlevselliği bəzən problemlidir.",
                'review_date' => now(),
            ]);
            Rating::create([
                'product_id' => 35,
                'user_id' => 15,
                'rating' => 4, // Rating (1-5)
                'review_id' => $review35->id, // Linking Rating to Review
            ]);
        });
    }
}
