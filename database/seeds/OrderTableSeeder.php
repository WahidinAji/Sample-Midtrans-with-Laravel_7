<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'order_code' => 'azsxdcfv',
            'price' => 10000,
            'customer_name' => 'customer 1',
            'customer_email' => 'email@gmail.com',
            'customer_phone' => '081234123499',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('orders')->insert([
            'order_code' => 'qawsedrf',
            'price' => 10000,
            'customer_name' => 'customer 1',
            'customer_email' => 'gmail@gmail.com',
            'customer_phone' => '081234123499',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
