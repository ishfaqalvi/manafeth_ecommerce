<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title'       => 'My First Blog Post',
                'image'       => 'images/blog/b1.png',
                'date'        => strtotime(now()),
                'special'     => 'Yes',
                'description' => 'This is a short description of my first blog post.',
                'detail'      => 'This is a detailed paragraph about my first blog post. Here you can add more information.',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'title'       => 'Exploring Laravel',
                'image'       => 'images/blog/b2.png',
                'date'        => strtotime(now()),
                'special'     => null,
                'description' => 'Short description about exploring Laravel.',
                'detail'      => 'Detailed paragraph about exploring Laravel. Here you can add more information about features, benefits, and experiences.',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'title'       => 'Introduction to Laravel',
                'image'       => 'images/blog/b3.png',
                'date'        => strtotime(now()),
                'special'     => null,
                'description' => 'This blog post will introduce you to Laravel.',
                'detail'      => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'title'       => 'Getting Started with Laravel',
                'image'       => 'images/blog/b4.png',
                'date'        => strtotime(now()),
                'special'     => 'Yes',
                'description' => 'Learn how to get started with Laravel.',
                'detail'      => 'Laravel has a fantastic community and a wealth of online resources. This blog will guide you through the basics of setting up your first Laravel project.',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'title'       => 'Advanced Eloquent Tricks',
                'image'       => 'images/blog/b5.png',
                'date'        => strtotime(now()),
                'special'     => 'Yes',
                'description' => 'Dive deep into Eloquent, Laravel\'s ORM.',
                'detail'      => 'Eloquent provides a beautiful, simple ActiveRecord implementation for working with your database. This post explores some advanced uses of Eloquent.',
                'created_at'  => now(),
                'updated_at'  => now()
            ]
        ];
        DB::table('blogs')->insert($blogs);
    }
}
