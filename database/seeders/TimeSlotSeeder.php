<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('time_slots')->insert([
            [
                'type'      => 'Self Pickup',
                'name'      => 'Self Pickup Time Slot',
                'start_time'=> '09:00:00',
                'end_time'  => '18:00:00',
            ],
            [
                'type'      => 'Home Delivery',
                'name'      => 'First Time Slot',
                'start_time'=> '09:00:00',
                'end_time'  => '11:00:00',
            ],
            [
                'type'      => 'Home Delivery',
                'name'      => 'Second Time Slot',
                'start_time'=> '11:00:00',
                'end_time'  => '13:00:00',
            ],
            [
                'type'      => 'Home Delivery',
                'name'      => 'Third Time Slot',
                'start_time'=> '13:00:00',
                'end_time'  => '15:00:00',
            ],
            [
                'type'      => 'Home Delivery',
                'name'      => 'Fourth Time Slot',
                'start_time'=> '15:00:00',
                'end_time'  => '17:00:00',
            ],[
                'type'      => 'Home Delivery',
                'name'      => 'Fifth Time Slot',
                'start_time'=> '17:00:00',
                'end_time'  => '19:00:00',
            ],[
                'type'      => 'Home Delivery',
                'name'      => 'Sixth Time Slot',
                'start_time'=> '19:00:00',
                'end_time'  => '21:00:00',
            ]
        ]);
    }
}
