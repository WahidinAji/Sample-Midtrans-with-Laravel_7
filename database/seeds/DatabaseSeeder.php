<?php

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
        // $this->call(PaymentCustomerSeeder::class);
        // $this->call(OrderTableSeeder::class);
        $this->call(JoinSeeder::class);
    }
}
