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
                'title'  => 'Banner 1',
                'image'  => 'images/banner/banner1.png',
                'order'  => 1,
                'type'   => 'Rent',
                'status' => 'Active'
            ],
            [
                'title'  => 'Banner 2',
                'image'  => 'images/banner/banner1.png',
                'order'  => 2,
                'type'   => 'Rent',
                'status' => 'Active'
            ],
            [
                'title'  => 'Banner 3',
                'image'  => 'images/banner/banner1.png',
                'order'  => 3,
                'type'   => 'Sale',
                'status' => 'Active'
            ],
            [
                'title'  => 'Banner 4',
                'image'  => 'images/banner/banner1.png',
                'order'  => 4,
                'type'   => 'Sale',
                'status' => 'Active'
            ],
            [
                'title'  => 'Banner 5',
                'image'  => 'images/banner/banner1.png',
                'order'  => 5,
                'type'   => 'Maintenance',
                'status' => 'Active'
            ],
            [
                'title'  => 'Banner 6',
                'image'  => 'images/banner/banner1.png',
                'order'  => 6,
                'type'   => 'Maintenance',
                'status' => 'Active'
            ]
        ]);
    }
}
