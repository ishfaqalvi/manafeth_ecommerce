<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Customer::create([
            'name'              => 'Test Customer',
            'email'             => 'testcustomer@gmail.com',
            'password'          => 'password',
            'email_verified_at' => '2024-03-02 15:30:59',
            'mobile_number'     => '+923001234567'
        ]);
        DB::table('personal_access_tokens')->insert([
            'tokenable_type'=> 'App\Models\Customer',
            'tokenable_id'  => '1',
            'name'          => 'customer-token',
            'token'         => '2|5TEVtTENBFp3WPMKiRpcx8WrBrvcjuH0kXcdAeW084476a7c',
            'abilities'     => '["*"]'
        ]);
    }
}
