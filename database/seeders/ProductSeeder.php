<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'brand_id'         => 1,
                'category_id'      => 1,
                'sub_category_id'  => 1,
                'name'             => 'Manual Standard Wheelchair MW01',
                'serial_number'    => 123,
                'engine_number'    => 112233,
                'model'            => 2023,
                'thumbnail'        => 'images/product/p1.png',
                'quantity'         => 10,
                'price'            => 3000,
                'discount'         => null,
                'type'             => 'Rent',
                'special'          => 'Yes',
                'status'           => 'Publish',
                'description'      => 'The Unique dual base rod ensure the wheelchair go straight all the time With a bigger seating space but a small folding size',
                'detail'           => 'Thunder mobility now is approaching you with something unique that is advantageous and favorable. Power wheelchairs launched by the company are now providing the client a chance to be independent. Disabled people are no more dependent on others. We have manufactured these powered wheelchairs just for your relief.'
            ],
            [
                'brand_id'         => 1,
                'category_id'      => 1,
                'sub_category_id'  => 1,
                'name'             => 'Manual Standard Wheelchair MW02',
                'serial_number'    => 456,
                'engine_number'    => 445566,
                'model'            => 2024,
                'thumbnail'        => 'images/product/p2.png',
                'quantity'         => 15,
                'price'            => 4500,
                'discount'         => 300,
                'type'             => 'Rent',
                'special'          => '',
                'status'           => 'Publish',
                'description'      => 'The Unique dual base rod ensure the wheelchair go straight all the time With a bigger seating space but a small folding size',
                'detail'           => 'Thunder mobility now is approaching you with something unique that is advantageous and favorable. Power wheelchairs launched by the company are now providing the client a chance to be independent. Disabled people are no more dependent on others. We have manufactured these powered wheelchairs just for your relief.'
            ],
            [
                'brand_id'         => 1,
                'category_id'      => 1,
                'sub_category_id'  => 1,
                'name'             => 'Manual Standard Wheelchair MW03',
                'serial_number'    => 123,
                'engine_number'    => 112233,
                'model'            => 2023,
                'thumbnail'        => 'images/product/p1.png',
                'quantity'         => 10,
                'price'            => 3000,
                'discount'         => null,
                'type'             => 'Sale',
                'special'          => 'Yes',
                'status'           => 'Publish',
                'description'      => 'The Unique dual base rod ensure the wheelchair go straight all the time With a bigger seating space but a small folding size',
                'detail'           => 'Thunder mobility now is approaching you with something unique that is advantageous and favorable. Power wheelchairs launched by the company are now providing the client a chance to be independent. Disabled people are no more dependent on others. We have manufactured these powered wheelchairs just for your relief.'
            ],
            [
                'brand_id'         => 1,
                'category_id'      => 1,
                'sub_category_id'  => 1,
                'name'             => 'Manual Standard Wheelchair MW04',
                'serial_number'    => 456,
                'engine_number'    => 445566,
                'model'            => 2024,
                'thumbnail'        => 'images/product/p2.png',
                'quantity'         => 15,
                'price'            => 4500,
                'discount'         => 300,
                'type'             => 'Sale',
                'special'          => '',
                'status'           => 'Publish',
                'description'      => 'The Unique dual base rod ensure the wheelchair go straight all the time With a bigger seating space but a small folding size',
                'detail'           => 'Thunder mobility now is approaching you with something unique that is advantageous and favorable. Power wheelchairs launched by the company are now providing the client a chance to be independent. Disabled people are no more dependent on others. We have manufactured these powered wheelchairs just for your relief.'
            ],
            [
                'brand_id'         => 1,
                'category_id'      => 1,
                'sub_category_id'  => 1,
                'name'             => 'Manual Standard Wheelchair MW05',
                'serial_number'    => 123,
                'engine_number'    => 112233,
                'model'            => 2023,
                'thumbnail'        => 'images/product/p1.png',
                'quantity'         => 10,
                'price'            => 3000,
                'discount'         => null,
                'type'             => 'Maintenance',
                'special'          => 'Yes',
                'status'           => 'Publish',
                'description'      => 'The Unique dual base rod ensure the wheelchair go straight all the time With a bigger seating space but a small folding size',
                'detail'           => 'Thunder mobility now is approaching you with something unique that is advantageous and favorable. Power wheelchairs launched by the company are now providing the client a chance to be independent. Disabled people are no more dependent on others. We have manufactured these powered wheelchairs just for your relief.'
            ],
            [
                'brand_id'         => 1,
                'category_id'      => 1,
                'sub_category_id'  => 1,
                'name'             => 'Manual Standard Wheelchair MW06',
                'serial_number'    => 456,
                'engine_number'    => 445566,
                'model'            => 2024,
                'thumbnail'        => 'images/product/p2.png',
                'quantity'         => 15,
                'price'            => 4500,
                'discount'         => 300,
                'type'             => 'Maintenance',
                'special'          => '',
                'status'           => 'Publish',
                'description'      => 'The Unique dual base rod ensure the wheelchair go straight all the time With a bigger seating space but a small folding size',
                'detail'           => 'Thunder mobility now is approaching you with something unique that is advantageous and favorable. Power wheelchairs launched by the company are now providing the client a chance to be independent. Disabled people are no more dependent on others. We have manufactured these powered wheelchairs just for your relief.'
            ]
        ]);
    }
}
