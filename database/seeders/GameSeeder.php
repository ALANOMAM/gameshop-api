<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [];

        for ($i = 1; $i <= 10; $i++) {
          $games[] = [
            'id' => $i,
            'image' => "placeholder_image_$i.jpg", // Placeholder image name
            'name' => "Game Name $i",
            'description' => "A brief description of Game $i",
            'price' => number_format(rand(1000, 9999) / 100, 2), // Random price between 10.00 and 99.99
            'visible' => (bool) rand(0, 1), // Random boolean for visibility
            'discount' => rand(0, 100), // Discount between 0 and 100 (whole number)
            'special_category' => (bool) rand(0, 1), // Random boolean for special category
            'user_id' => 1 //rand(1, 10), // Random user ID between 1 and 10 (assuming users table exists)
        ];
        }

        foreach ($games as $game) {
            $newGame = new Game();
            $newGame->image = $game['image'];
            $newGame->name = $game['name'];
            $newGame->description = $game['description'];
            $newGame->price = $game['price'];
            $newGame->visible= $game['visible'];
            $newGame->discount = $game['discount'];
            $newGame->special_category = $game['special_category'];
            $newGame->user_id = $game['user_id'];
            $newGame->save();
        }

    }


}
