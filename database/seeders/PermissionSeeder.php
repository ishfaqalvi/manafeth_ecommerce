<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
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

            'categories-list',
            'categories-view',
            'categories-create',
            'categories-edit',
            'categories-delete',
            'categories-subList',
            'categories-subCreate',
            'categories-subEdit',
            'categories-subDelete',

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
    }
}
