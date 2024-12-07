<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(AdminSeeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(CategorySeeder::class); 
        $this->call(BrandSeeder::class);    
        $this->call(TagSeeder::class);      
        $this->call(ProductSeeder::class);  
        $this->call(BlogMainSeeder::class);  
        $this->call(BlogSeeder::class);  
        $this->call(WhoWeAreServiceSeeder::class);  
        $this->call(WhoWeAreMainSeeder::class);  
        $this->call(OurJourneyMainSeeder::class);  
        $this->call(OurJourneyCounterSeeder::class);  
        $this->call(HowWeWorksSeeder::class);  
        $this->call(AboutSecuraSeeder::class);  
        $this->call(OurVisionSeeder::class);  
        $this->call(OurTeamSeeder::class);  
        $this->call(StateSeeder::class);  
        $this->call(CitySeeder::class);  
        $this->call(CommentSeeder::class);  
        $this->call(ReviewSeeder::class);  
    }
}
