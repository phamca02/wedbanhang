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
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // Mật khẩu đã được mã hóa
            ],
            [
                'name' => 'Leader User',
                'email' => 'leader@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Subscriber User',
                'email' => 'subscriber@example.com',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}