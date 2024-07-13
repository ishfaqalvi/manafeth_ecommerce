<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                "title" => "Banner 1",
                "image" => "images/banner/6628bfefdbaf5.png",
                "order" => "1",
                "type" => "Rent",
                "status" => "Active"
            ],
            [
                "title" => "Banner 5",
                "image" => "images/banner/6628c755af815.png",
                "order" => "5",
                "type" => "Maintenance",
                "status" => "Active"
            ],
            [
                "title" => "Welcome",
                "image" => "images/banner/6628abde0dbc8.png",
                "order" => "1",
                "type" => "Sale",
                "status" => "Active"
            ],
            [
                "title" => "Medical bed",
                "image" => "images/banner/6628ad53df7c5.png",
                "order" => "7",
                "type" => "Sale",
                "status" => "Active"
            ],
            [
                "title" => "Stair",
                "image" => "images/banner/6628ace8f318b.png",
                "order" => "8",
                "type" => "Sale",
                "status" => "Active"
            ]
        ]);
    }
}
