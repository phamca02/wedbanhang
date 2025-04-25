<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\order_detail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        
        //  $this->call(productSeeder::class);
        // $this->call(RolesTableSeeder::class);
        //  $this->call(UsersTableSeeder::class);
        // $this->call(orderSeeder::class); 
        // $this->call(UserRolesTableSeeder::class);
         $this->call(orderdetaiSeeder::class);
    }
}