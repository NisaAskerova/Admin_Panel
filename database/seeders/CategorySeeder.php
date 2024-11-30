<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Karbon Alarmları'],
            ['name' => 'Sızdırmazlıq Aşkarlayıcı'],
            ['name' => 'Təhlükəsizlik Sistemi'],
            ['name' => 'Ağıllı Ev'],
            ['name' => 'Duman Alarmları'],
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
    
}
