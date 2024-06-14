<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [];

for ($i = 1; $i <= 10; $i++) {
  $products[] = [
    'id' => $i,
    'image' => "placeholder_image_$i.jpg", // Replace with placeholder logic or image paths
    'name' => "Product Name $i",
    'description' => "This is a description for product $i",
    'price' => number_format(rand(1000, 9999) / 100, 2), // Random price between $10.00 and $99.99
    'visible' => (bool) rand(0, 1), // Random boolean for visibility
    'discount' => rand(0, 50), // Discount between 0 and 50
    'featured' => (bool) rand(0, 1), // Random boolean for featured
    'user_id' => 1//rand(1, 10), // Random user ID between 1 and 10 (assuming users table)
  ];
}

foreach ($products as $product) {
    $newProduct = new Product();
    $newProduct->image = $product['image'];
    $newProduct->name = $product['name'];
    $newProduct->description = $product['description'];
    $newProduct->price = $product['price'];
    $newProduct->visible= $product['visible'];
    $newProduct->discount = $product['discount'];
    $newProduct->featured = $product['featured'];
    $newProduct->user_id = $product['user_id'];
    $newProduct->save();
}


    }
}
