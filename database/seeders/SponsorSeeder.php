<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         $sponsors = [];

        for ($i = 1; $i <= 10; $i++) {
          $sponsors[] = [
            'id' => $i,
            'image' => "placeholder_image_$i.jpg", // Placeholder image name
            'name' => "Sponsor Name $i",
            'fund' => number_format(rand(1000, 99999) / 100, 2), // Random fund between $10.00 and $999.99
            'user_id' => 1 //rand(1, 10), // Random user ID between 1 and 10 (assuming users table exists)
        ];
        }

        foreach ($sponsors as $sponsor) {
            $newSponsor = new Sponsor();
            $newSponsor->image = $sponsor['image'];
            $newSponsor->name = $sponsor['name'];
            $newSponsor->fund = $sponsor['fund'];
            $newSponsor->user_id = $sponsor['user_id'];
            $newSponsor->save();
        }
        





    }

}
