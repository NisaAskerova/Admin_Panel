<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSecura;

class AboutSecuraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutSecura::create([
            'type' => 'ABOUT SECURA',
            'title' => 'Provide Top Class Protection to The Client’s',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.',
            'image' => 'images/abutSecura.png',  
            'icon' => 'icons/leftIcon.svg',   
        ]);
    }
}
