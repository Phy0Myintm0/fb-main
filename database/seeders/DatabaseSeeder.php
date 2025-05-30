<?php

namespace Database\Seeders;

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
        // Call the admin user seeder
        $this->call([
            AdminUserSeeder::class,
        ]);
        
        // You can add other seeders here
    }
}