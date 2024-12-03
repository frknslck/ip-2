<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Category;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach($categories as $category){
            for($i = 0; $i <10; $i++){
                News::create([
                    'category_id' => $category->id,
                    'title' => fake()->text,
                    'description' => fake()->text,
                    'image' => 'https://http.cat/images/102.jpg',
                    'content' => fake()->text
                ]);
            }
        }
    }
}
