<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      	=> 'Super Admin',
            'email'     	=> 'superadmin@gmail.com',
            'password'  	=> 'password',
        ]);

        $role = Role::findById(1);
        $user->assignRole(1);
    }
}
