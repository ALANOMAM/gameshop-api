<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $ratings = [];

        for ($i = 1; $i <= 5; $i++) {
          $ratings[] = [
            'id' => $i,
            'rating_number' =>  $i,
        ];
        }

        foreach ($ratings as $rating) {
            $newRating = new Rating();
            $newRating->rating_number = $rating['rating_number'];
            $newRating->save();
        }




    }
}
