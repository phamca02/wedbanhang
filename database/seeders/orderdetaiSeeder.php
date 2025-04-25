<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orderdetaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('order_details')->insert([
                'order_id' => rand(3, 50),
                'product_id' => rand(1, 100), // Giả sử có 10 người dùng
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }}
}