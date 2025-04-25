<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('orders')->insert([
                'user_id' => rand(1, 10), // Giả sử có 10 người dùng
                'order_name' => 'order ' . $i, // Tên sản phẩm
                'quantity' => rand(1, 5), // Số lượng ngẫu nhiên từ 1 đến 5
                'total_price' => rand(1000, 5000) / 100, // Tổng tiền từ 10.00 đến 50.00
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }}
}