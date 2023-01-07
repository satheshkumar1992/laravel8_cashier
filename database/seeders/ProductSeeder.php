<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=50; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(10),
                'price' => $i * 10,
                'description' => Str::random(50),
            ]);
        }
    }
    
}
