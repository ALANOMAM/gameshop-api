<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           // GameSeeder::class,
           // ProductSeeder::class,
           //BlogSeeder::class,
           //SponsorSeeder::class,
            //RatingSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
