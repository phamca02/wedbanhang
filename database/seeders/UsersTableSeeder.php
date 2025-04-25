<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('users')->insert([
                'name' => 'Người dùng ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'), // Mật khẩu đã mã hóa
                // 'role_id' => rand(1, 3), // Giả sử có 5 vai trò khác nhau
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}