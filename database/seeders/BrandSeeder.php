<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands=[
            ['name'=>'Igloohome'],//1
            ['name'=>'HIK Vision'],//2
            ['name'=>'Security System'],//3
            ['name'=>'Ezviz'],//4
            ['name'=>'D-Link'],//5
            ['name'=>'Samsung'],//6
            ['name'=>'CP Plus'],//7
        ];
        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
