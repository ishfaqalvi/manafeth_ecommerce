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
        $data = [];
        for($i = 1; $i < 20; $i++) {
            $data[] = ['name'=>'Brand '.$i, 'logo'=>'images/brand/brand_'.$i.'.png'];
        }
        DB::table('brands')->insert($data);
    }
}
