<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Amerika şəhərləri
        $cities = [
            // California
            ['name' => 'Los Angeles', 'state_id' => 1],
            ['name' => 'San Francisco', 'state_id' => 1],
            ['name' => 'San Diego', 'state_id' => 1],
            ['name' => 'Sacramento', 'state_id' => 1],

            // Texas
            ['name' => 'Houston', 'state_id' => 2],
            ['name' => 'Dallas', 'state_id' => 2],
            ['name' => 'Austin', 'state_id' => 2],
            ['name' => 'San Antonio', 'state_id' => 2],

            // Florida
            ['name' => 'Miami', 'state_id' => 3],
            ['name' => 'Orlando', 'state_id' => 3],
            ['name' => 'Tampa', 'state_id' => 3],
            ['name' => 'Jacksonville', 'state_id' => 3],

            // New York
            ['name' => 'New York City', 'state_id' => 4],
            ['name' => 'Buffalo', 'state_id' => 4],
            ['name' => 'Rochester', 'state_id' => 4],
            ['name' => 'Syracuse', 'state_id' => 4],

            // Illinois
            ['name' => 'Chicago', 'state_id' => 5],
            ['name' => 'Aurora', 'state_id' => 5],
            ['name' => 'Naperville', 'state_id' => 5],
            ['name' => 'Joliet', 'state_id' => 5],

            // Pennsylvania
            ['name' => 'Philadelphia', 'state_id' => 6],
            ['name' => 'Pittsburgh', 'state_id' => 6],
            ['name' => 'Allentown', 'state_id' => 6],
            ['name' => 'Erie', 'state_id' => 6],

            // Ohio
            ['name' => 'Columbus', 'state_id' => 7],
            ['name' => 'Cleveland', 'state_id' => 7],
            ['name' => 'Cincinnati', 'state_id' => 7],
            ['name' => 'Toledo', 'state_id' => 7],

            // Georgia
            ['name' => 'Atlanta', 'state_id' => 8],
            ['name' => 'Savannah', 'state_id' => 8],
            ['name' => 'Augusta', 'state_id' => 8],
            ['name' => 'Columbus', 'state_id' => 8],

            // North Carolina
            ['name' => 'Charlotte', 'state_id' => 9],
            ['name' => 'Raleigh', 'state_id' => 9],
            ['name' => 'Greensboro', 'state_id' => 9],
            ['name' => 'Durham', 'state_id' => 9],

            // Michigan
            ['name' => 'Detroit', 'state_id' => 10],
            ['name' => 'Grand Rapids', 'state_id' => 10],
            ['name' => 'Flint', 'state_id' => 10],
            ['name' => 'Lansing', 'state_id' => 10],
        ];

        // Bütün şəhərləri "cities" cədvəlinə daxil et
        DB::table('cities')->insert($cities);
    }
}
