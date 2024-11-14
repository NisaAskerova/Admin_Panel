<?php
namespace Database\Seeders;

use App\Models\WhoWeAreMain;
use Illuminate\Database\Seeder;

class WhoWeAreMainSeeder extends Seeder
{
    public function run()
    {
        WhoWeAreMain::create([
            'type' => 'WHO WE ARE',
            'main_title' => 'Private Security Authorised by the Police to Take Care of Your Security',
            'main_description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.',
            'image' => 'images/whoweare.png',
        ]);

    }
}
