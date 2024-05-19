<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $check_role = DB::table('roles')->find(1);
        if($check_role){
            $role = Role::findById(1);
            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                $role->revokePermissionTo($permission);
            }
            $role->syncPermissions();
            Permission::query()->delete();
        }
        else
        {
            $role = Role::create(['name' => 'Super Admin','guard_name' => 'web']);
        }
        $permissions = [
            'orders-list',
            'orders-view',
            'orders-create',
            'orders-edit',
            'orders-delete',

            'maintenenceRequests-list',
            'maintenenceRequests-view',
            'maintenenceRequests-create',
            'maintenenceRequests-edit',
            'maintenenceRequests-delete',

            'rentRequests-list',
            'rentRequests-view',
            'rentRequests-create',
            'rentRequests-edit',
            'rentRequests-delete',

            'customers-list',
            'customers-view',
            'customers-create',
            'customers-edit',
            'customers-delete',

            'saleProducts-list',
            'saleProducts-view',
            'saleProducts-create',
            'saleProducts-edit',
            'saleProducts-delete',

            'rentProducts-list',
            'rentProducts-view',
            'rentProducts-create',
            'rentProducts-edit',
            'rentProducts-delete',

            'maintenanceProducts-list',
            'maintenanceProducts-view',
            'maintenanceProducts-create',
            'maintenanceProducts-edit',
            'maintenanceProducts-delete',

            'productSpecification-list',
            'productSpecification-create',
            'productSpecification-edit',
            'productSpecification-delete',

            'productResource-list',
            'productResource-edit',
            'productResource-create',
            'productResource-delete',

            'productImage-list',
            'productImage-create',
            'productImage-delete',

            'banners-list',
            'banners-view',
            'banners-create',
            'banners-edit',
            'banners-delete',

            'brands-list',
            'brands-view',
            'brands-create',
            'brands-edit',
            'brands-delete',

            'blogs-list',
            'blogs-view',
            'blogs-create',
            'blogs-edit',
            'blogs-delete',

            'topSearches-list',
            'topSearches-view',
            'topSearches-create',
            'topSearches-edit',
            'topSearches-delete',

            'saleCategories-list',
            'saleCategories-view',
            'saleCategories-create',
            'saleCategories-edit',
            'saleCategories-delete',

            'rentCategories-list',
            'rentCategories-view',
            'rentCategories-create',
            'rentCategories-edit',
            'rentCategories-delete',

            'saleSubCategories-list',
            'saleSubCategories-view',
            'saleSubCategories-create',
            'saleSubCategories-edit',
            'saleSubCategories-delete',

            'rentSubCategories-list',
            'rentSubCategories-view',
            'rentSubCategories-create',
            'rentSubCategories-edit',
            'rentSubCategories-delete',

            'fcmNotifications-list',
            'fcmNotifications-view',
            'fcmNotifications-create',
            'fcmNotifications-edit',
            'fcmNotifications-delete',

            'timeSlots-list',
            'timeSlots-view',
            'timeSlots-create',
            'timeSlots-edit',
            'timeSlots-delete',

            'promoCodes-list',
            'promoCodes-view',
            'promoCodes-create',
            'promoCodes-edit',
            'promoCodes-delete',

            'employees-list',
            'employees-view',
            'employees-create',
            'employees-edit',
            'employees-delete',

            'roles-list',
            'roles-view',
            'roles-create',
            'roles-edit',
            'roles-delete',

            'users-list',
            'users-view',
            'users-create',
            'users-edit',
            'users-delete',

            'notifications-list',
            'notifications-view',
            'notifications-create',
            'notifications-edit',
            'notifications-delete',

            'audits-list',
            'audits-view',
            'audits-create',
            'audits-edit',
            'audits-delete',

            'logs-list',
            'logs-view',
            'logs-create',
            'logs-edit',
            'logs-delete',

            'settings-list',
            'settings-create',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $role->syncPermissions(Permission::all());
    }
}
