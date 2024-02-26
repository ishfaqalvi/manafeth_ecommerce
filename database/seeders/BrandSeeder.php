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
        DB::table('brands')->insert([
            ['name'=>'Drive Medical', 'logo'=>'images/brand/Drive-Medical.jpg'],
            ['name'=>'Heartway',      'logo'=>'images/brand/Heartway.png'],
            ['name'=>'Rehamo',        'logo'=>'images/brand/Rehamo.jpg'],
            ['name'=>'Thunder',       'logo'=>'images/brand/Thunder.png']
        ]);
    }
}
