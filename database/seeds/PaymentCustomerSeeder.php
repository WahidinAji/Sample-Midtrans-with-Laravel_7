<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class PaymentCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->firstName();
            DB::table('payments')->insert([
                'order_id' => $faker->randomDigitNotNull,
                'gross_amount' => $faker->numberBetween(10000, 1000000000),
                'item_id' => $faker->randomDigitNotNull,
                'item_name' => $faker->company,
                'customer_name' => $faker->name(null),
                'customer_email' => $faker->freeEmail,
                'customer_phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // DB::table('payments')->insert([

        // ])
    }
}
