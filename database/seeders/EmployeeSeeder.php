<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Driver', 'Warehouse Boy', 'Maintenence Boy'];
        Employee::create([
            'name'              => 'Test Emplyee',
            'email'             => 'testemployee@gmail.com',
            'mobile_number'     => '+9230712345678',
            'password'          => 'password',
            'email_verified_at' => '2024-03-02 15:30:59',
            'roles'             => $roles,
            'fcm_token'         => 'eIjGZ45JQDemDirRFZ_p0k:APA91bF6HNHN88rYAR92YLU-IWYdJU0nN88zBEFkF8rCLynxfC6CL6cUmdSADlz2yCA7qAO3OrJydUh4jyGVclAKEz4bwe1h1y18fqPeL1CXfqv2MQxMdc_9p0Vq-BYJcOnswH8SLB48'
        ]);
    }
}
