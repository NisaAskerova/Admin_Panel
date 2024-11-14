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
        $tags=[
            ['name'=>'Camera'],
            ['name'=>'Commercial'],
            ['name'=>'Home Security'],
            ['name'=>'Lens'],
            ['name'=>'Commercial Security'],
        ];
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
