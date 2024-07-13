<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Thunder",
                "logo" => "images/brand/661cf7a337b03.png",
                "website" => "NULL"
            ],
            [
                "name" => "Pride-Mobility",
                "logo" => "images/brand/661cf7bb72c7e.png",
                "website" => "NULL"
            ],
            [
                "name" => "Alerta",
                "logo" => "images/brand/661cf7cb67a5f.jpg",
                "website" => "NULL"
            ],
            [
                "name" => "BraunAbility",
                "logo" => "images/brand/661cf7e2f04a3.png",
                "website" => "NULL"
            ],
            [
                "name" => "Handicare",
                "logo" => "images/brand/661cf7f67c9a6.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 6",
                "logo" => "images/brand/brand_6.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 7",
                "logo" => "images/brand/brand_7.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 8",
                "logo" => "images/brand/brand_8.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 9",
                "logo" => "images/brand/brand_9.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 10",
                "logo" => "images/brand/brand_10.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 11",
                "logo" => "images/brand/brand_11.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 12",
                "logo" => "images/brand/brand_12.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 13",
                "logo" => "images/brand/brand_13.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 14",
                "logo" => "images/brand/brand_14.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 15",
                "logo" => "images/brand/brand_15.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 16",
                "logo" => "images/brand/brand_16.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 17",
                "logo" => "images/brand/brand_17.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 18",
                "logo" => "images/brand/brand_18.png",
                "website" => "NULL"
            ],
            [
                "name" => "Brand 19",
                "logo" => "images/brand/brand_19.png",
                "website" => "NULL"
            ],
            [
                "name" => "Mariani",
                "logo" => "images/brand/6641c27b1d857.jpg",
                "website" => "www.manafethme.com"
            ],
            [
                "name" => "Q'STRAINT",
                "logo" => "images/brand/6645aad74b961.png",
                "website" => "https://www.qstraint.com/",
            ],
            [
                "name" => "Mariani",
                "logo" => "images/brand/664601ac3bd06.png",
                "website" => "https://marianilift.com/lifts-for-disabled-people/wheelchair-cassette-lifts/?lang=en",
            ],
            [
                "name" => "Garaventa",
                "logo" => "images/brand/664701cc61130.jpg",
                "website" => "NULL"
            ]
        ];
        DB::table('brands')->insert($data);
    }
}
