<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[
            'Politics',
            'Technology',
            'Sports',
            'Health',
            'Entertainment'
        ];

        $i = 1;

        foreach($categories as $category){
            Category::create([
                'name' => $category,
                'order_no' => $i++
            ]);
        }
    }


}
