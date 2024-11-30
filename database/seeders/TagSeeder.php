<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Kamera'],
            ['name' => 'Ticarət'],
            ['name' => 'Evlər üçün Təhlükəsizlik'],
            ['name' => 'Lens'],
            ['name' => 'Ticarət Təhlükəsizliyi'],
        ];
        
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
