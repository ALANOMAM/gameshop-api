<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [];

for ($i = 1; $i <= 10; $i++) {
  // Generate some placeholder content
  $image = "placeholder_image_$i.jpg";
  $description = "This is a description for blog post number $i.";
  $link = "https://example.com/blog/post/$i";
  $user_id = 1;//rand(1, 10); // Assuming user ids range from 1 to 10

  $blogs[] = [
    'id' => $i,
    'image' => $image,
    'description' => $description,
    'link' => $link,
    'user_id' => $user_id,
  ];
}


foreach ($blogs as $blog) {
    $newBlog = new Blog();
    $newBlog->image = $blog['image'];
    $newBlog->description = $blog['description'];
    $newBlog->link = $blog['link'];
    $newBlog->user_id = $blog['user_id'];
    $newBlog->save();
}


    }
}
