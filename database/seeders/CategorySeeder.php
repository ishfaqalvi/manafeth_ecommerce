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
                "type" => "Sale",
                "name" => "Power Wheechair",
                "image" => "images/category/category-1.jpg",
                "banner" => "images/category/category-1.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Mobility Scooter",
                "image" => "images/brand/661cc8793f45e.jpg",
                "banner" => "images/brand/661cc87958b0e.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Manual Wheelchair",
                "image" => "images/brand/661cc8969579f.jpg",
                "banner" => "images/brand/661cc896b2b62.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Bedroom Aids",
                "image" => "images/brand/661cc8b2dca42.jpg",
                "banner" => "images/brand/661cc8b304f5e.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Wheelchair Ramp",
                "image" => "images/brand/661cc8ca9e4b4.jpg",
                "banner" => "images/brand/661cc8cab6214.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Turny Seat & Carony",
                "image" => "images/brand/662799d808499.png",
                "banner" => "images/brand/662799d846eef.png"
            ],
            [
                "type" => "Sale",
                "name" => "Wheelchair Lift",
                "image" => "images/brand/662a395315c84.png",
                "banner" => "images/brand/662a39534dd96.png"
            ],
            [
                "type" => "Rent",
                "name" => "Power Wheelchair",
                "image" => "images/brand/662cb850df940.jpg",
                "banner" => "images/brand/662cb8511fd18.jpg"
            ],
            [
                "type" => "Rent",
                "name" => "Manual Wheelchair",
                "image" => "images/brand/662cb878d5315.jpg",
                "banner" => "images/brand/662cb878f00a5.jpg"
            ],
            [
                "type" => "Rent",
                "name" => "Medical Bed",
                "image" => "images/brand/662cb88cafa33.jpg",
                "banner" => "images/brand/662cb88ccb277.jpg"
            ],
            [
                "type" => "Rent",
                "name" => "Moblity Scooter",
                "image" => "images/brand/662cdda7befe2.jpg",
                "banner" => "images/brand/662cdda7d9978.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Stairlift For Home",
                "image" => "images/brand/663db85f947c9.jpg",
                "banner" => "images/brand/663db85fbb465.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Mariani UVL",
                "image" => "images/brand/6645d21839305.png",
                "banner" => "images/brand/6645d2185466e.png"
            ],
            [
                "type" => "Sale",
                "name" => "Driving Aids",
                "image" => "images/brand/6645cb49b58dd.png",
                "banner" => "images/brand/6645cb49c4ff0.png"
            ],
            [
                "type" => "Rent",
                "name" => "Bedroom Aids",
                "image" => "images/brand/66430cbf2b55e.jpeg",
                "banner" => "images/brand/66430cbf53691.png"
            ],
            [
                "type" => "Rent",
                "name" => "Wheelchair Ramp",
                "image" => "images/brand/664332457b983.jpg",
                "banner" => "images/brand/66433245b586b.jpg"
            ],
            [
                "type" => "Sale",
                "name" => "Q'straint Lock System",
                "image" => "images/brand/6645c93426d8b.png",
                "banner" => "images/brand/6645c9343afa4.png"
            ],
            [
                "type" => "Sale",
                "name" => "Garaventa Lift",
                "image" => "images/brand/6646f9743412f.png",
                "banner" => "images/brand/6646f9745ef43.png"
            ]
        ]);
        DB::table('sub_categories')->insert([
            [
                "type" => "Sale",
                "category_id" => "1",
                "name" => "Thunder",
                "image" => "images/brand/661cca35044eb.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "1",
                "name" => "Pride-Mobility",
                "image" => "images/brand/661cce2f0093b.png"
            ],
            [
                "type" => "Sale",
                "category_id" => "3",
                "name" => "Thunder",
                "image" => "images/brand/661cf90c11878.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "3",
                "name" => "Alerta",
                "image" => "images/brand/661d0a3068550.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "4",
                "name" => "Manual Medical Bed",
                "image" => "images/brand/661d1179f14ed.jpeg"
            ],
            [
                "type" => "Sale",
                "category_id" => "4",
                "name" => "Electric Medical Bed",
                "image" => "images/brand/661d1192ac3d2.jpeg"
            ],
            [
                "type" => "Sale",
                "category_id" => "2",
                "name" => "Pride Mobility",
                "image" => "images/brand/661e4dfd744ea.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "4",
                "name" => "Mattress",
                "image" => "images/brand/661e516750216.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "4",
                "name" => "Overbed Table",
                "image" => "images/brand/661f7fccb3ee1.png"
            ],
            [
                "type" => "Sale",
                "category_id" => "4",
                "name" => "Patient Hoist",
                "image" => "images/brand/661f7ff60a3e8.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "4",
                "name" => "Recliner Sofa",
                "image" => "images/brand/661f80527bbe8.png"
            ],
            [
                "type" => "Sale",
                "category_id" => "6",
                "name" => "Turny Evo",
                "image" => "images/brand/66279bcc41c16.jpeg"
            ],
            [
                "type" => "Sale",
                "category_id" => "6",
                "name" => "Turny Orbit",
                "image" => "images/brand/66279c8e2bf00.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "6",
                "name" => "Carony",
                "image" => "images/brand/6627b14007e7b.png"
            ],
            [
                "type" => "Sale",
                "category_id" => "5",
                "name" => "Thunder",
                "image" => "images/brand/6629ff4b20e15.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "8",
                "name" => "Thunder",
                "image" => "images/brand/662cb89e61912.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "8",
                "name" => "Pride-Mobility",
                "image" => "images/brand/662cb8c2636e0.png"
            ],
            [
                "type" => "Rent",
                "category_id" => "10",
                "name" => "Thunder",
                "image" => "images/brand/662cb8e2abdf1.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "11",
                "name" => "Pride Mobility",
                "image" => "images/brand/662cdde2d7bd5.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "9",
                "name" => "Alerta",
                "image" => "images/brand/662ce0bfe4d72.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "7",
                "name" => "BraunAbility",
                "image" => "images/brand/6639e6b44b698.png"
            ],
            [
                "type" => "Sale",
                "category_id" => "13",
                "name" => "EP300",
                "image" => "images/brand/6641c78c915bd.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "12",
                "name" => "Freecurve",
                "image" => "images/brand/6641cafd5782a.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "12",
                "name" => "1000 Indoor",
                "image" => "images/brand/6641cb113555d.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "12",
                "name" => "1100",
                "image" => "images/brand/6641cb21d5b95.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "12",
                "name" => "1000 Outdoor",
                "image" => "images/brand/6641cb3610f5d.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "12",
                "name" => "4000 Indoor",
                "image" => "images/brand/6641cb4b5210d.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "12",
                "name" => "4000 Outdoor",
                "image" => "images/brand/6641cb5e52a2e.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "14",
                "name" => "Carospeed Classic",
                "image" => "images/brand/6641d09cabc65.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "14",
                "name" => "Carospeed Menox",
                "image" => "images/brand/6641d0bb37964.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "14",
                "name" => "Pedals",
                "image" => "images/brand/6641d14c29c6f.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "4",
                "name" => "Patient Transfer Chair",
                "image" => "images/brand/664305f63bfd0.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "15",
                "name" => "Patient Transfer Chair",
                "image" => "images/brand/66430ce3ea937.png"
            ],
            [
                "type" => "Rent",
                "category_id" => "16",
                "name" => "2 Feet",
                "image" => "images/brand/66433275e285e.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "16",
                "name" => "3 feet",
                "image" => "images/brand/66434d73cea40.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "16",
                "name" => "4 feet",
                "image" => "images/brand/66435a7dc775c.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "16",
                "name" => "5 feet",
                "image" => "images/brand/66435b5853d60.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "16",
                "name" => "6 feet",
                "image" => "images/brand/664360d20b695.png"
            ],
            [
                "type" => "Rent",
                "category_id" => "16",
                "name" => "8 feet",
                "image" => "images/brand/6643633ea510e.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "16",
                "name" => "10 feet",
                "image" => "images/brand/664363582c466.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "15",
                "name" => "Mattress",
                "image" => "images/brand/664366051b4bf.png"
            ],
            [
                "type" => "Sale",
                "category_id" => "17",
                "name" => "QRT Standard",
                "image" => "images/brand/6645ab2b62386.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "18",
                "name" => "Platform Lift",
                "image" => "images/brand/6646ffdc5e07f.jpg"
            ],
            [
                "type" => "Sale",
                "category_id" => "18",
                "name" => "Platform Lift",
                "image" => "images/brand/6646ffdef373f.jpg"
            ],
            [
                "type" => "Rent",
                "category_id" => "9",
                "name" => "Thunder",
                "image" => "images/brand/6684fceb0e7f1.png"
            ],
            [
                "type" => "Sale",
                "category_id" => "7",
                "name" => "Mariani",
                "image" => "images/brand/668f9514e8497.png"
            ]
        ]);
    }
}
