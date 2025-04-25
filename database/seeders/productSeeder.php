<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  for($i = 1 ; $i <= 100 ; $i++){
        DB::table('products')->insert([
            'name' => 'sản phẩm ' .$i,
            'description' => 'chi tiết ' .$i,
            'price' => rand(10, 100),
        ]);
    }
    }
}