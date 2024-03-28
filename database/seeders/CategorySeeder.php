<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'First Category', 
                'image' => 'images/category/category-1.jpg',
                'banner' => 'images/category/category-1.jpg'
            ]
        ]);
        DB::table('sub_categories')->insert([
            [
                'category_id' => 1, 
                'name'=>'First Sub Category', 
                'image'=>'images/subcategory/subcategory-1.jpg'
            ]
        ]);
    }
}
