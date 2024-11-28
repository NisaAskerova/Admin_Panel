<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Amerika ştatları
        $states = [
            ['name' => 'California'],
            ['name' => 'Texas'],
            ['name' => 'Florida'],
            ['name' => 'New York'],
            ['name' => 'Illinois'],
            ['name' => 'Pennsylvania'],
            ['name' => 'Ohio'],
            ['name' => 'Georgia'],
            ['name' => 'North Carolina'],
            ['name' => 'Michigan'],
            ['name' => 'New Jersey'],
            ['name' => 'Virginia'],
            ['name' => 'Washington'],
            ['name' => 'Arizona'],
            ['name' => 'Massachusetts'],
            ['name' => 'Tennessee'],
            ['name' => 'Indiana'],
            ['name' => 'Missouri'],
            ['name' => 'Maryland'],
            ['name' => 'Wisconsin'],
            ['name' => 'Colorado'],
            ['name' => 'Minnesota'],
            ['name' => 'South Carolina'],
            ['name' => 'Alabama'],
            ['name' => 'Louisiana'],
            ['name' => 'Kentucky'],
            ['name' => 'Oregon'],
            ['name' => 'Oklahoma'],
            ['name' => 'Connecticut'],
            ['name' => 'Iowa'],
            ['name' => 'Mississippi'],
            ['name' => 'Arkansas'],
            ['name' => 'Kansas'],
            ['name' => 'Nevada'],
            ['name' => 'Utah'],
            ['name' => 'Idaho'],
            ['name' => 'Hawaii'],
            ['name' => 'Alaska'],
            ['name' => 'Delaware'],
            ['name' => 'Montana'],
            ['name' => 'Rhode Island'],
            ['name' => 'Wyoming'],
            ['name' => 'Vermont'],
            ['name' => 'New Hampshire'],
            ['name' => 'Maine'],
            ['name' => 'North Dakota'],
            ['name' => 'South Dakota'],
            ['name' => 'Nebraska'],
            ['name' => 'West Virginia'],
            ['name' => 'New Mexico'],
            ['name' => 'Kansas'],
            ['name' => 'Kentucky'],
            ['name' => 'Oklahoma'],
            ['name' => 'Colorado'],
            ['name' => 'Wisconsin'],
        ];

        // Bütün ştatları "states" cədvəlinə daxil et
        DB::table('states')->insert($states);
    }
}
