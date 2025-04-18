<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            DB::table('user_roles')->insert([
                ['user_id' => 1, 'role_id' => 1], // User 1 là Admin
                ['user_id' => 2, 'role_id' => 2], // User 1 cũng là Editor
                ['user_id' => 4, 'role_id' => 3], // User 2 là Subscriber
                ['user_id' => 3, 'role_id' => 1], // User 3 là Guest
                // Thêm dữ liệu mẫu nếu cần
            ]);
        
    }
}
