<?php

use App\Model\Join;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('joins')->insert([
            'team_id' => 1,
            'event_id' => 1,
            'status' => 0,
            'join_date' => now(),
            'phone' => 098765432199,
            'aprroved_by' => 0,
            'approved_at' => 0,
            'cancelled_by' => 0,
            'cancellation_note' => 0,
            'cancellation_note' => 0,
            'code_order_id' => Join::JOINCODE,
            'gross_amount' => 10000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
