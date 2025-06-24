<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  Category Creattion
        $cat1 = Category::create([
            'name' => 'Technology', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'Entertainment', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'Politics', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'World', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'Sports', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'Lifestyle', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'Health', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'Business', 
            'slug' => 'cat-one',
        ]);
        $cat1 = Category::create([
            'name' => 'Environemnt', 
            'slug' => 'cat-one',
        ]);
    }
}
