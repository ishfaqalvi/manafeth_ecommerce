<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TimeSlotSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
