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
        $code1 = Join::JOINCODE . \uniqid() . '-' . \rand() . '-' ./*gross_amount*/ 10000 . /*team_id*/ 3 ./*event_id*/ 1 ./*approved_by*/ 16;
        DB::table('joins')->insert([
            'team_id' => 1,
            'event_id' => 1,
            'join_date' => now(),
            'phone' => "098765432199",
            'approved_by' => 1,
            'approved_at' => now(),
            'code_order_id' => "$code1",
            'gross_amount' => 10000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $code2 = Join::JOINCODE . \uniqid() . '-' . \rand() . '-' ./*gross_amount*/ 10000 . /*team_id*/ 3 ./*event_id*/ 1 ./*approved_by*/ 16;
        DB::table('joins')->insert([
            'team_id' => 2,
            'event_id' => 1,
            'join_date' => now(),
            'phone' => "098765432199",
            'approved_by' => 6,
            'approved_at' => now(),
            'code_order_id' => "$code2",
            'gross_amount' => 10000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $code3 = Join::JOINCODE . \uniqid() . '-' . \rand() . '-' ./*gross_amount*/ 10000 . /*team_id*/ 3 ./*event_id*/ 1 ./*approved_by*/ 16;
        DB::table('joins')->insert([
            'team_id' => 3,
            'event_id' => 2,
            'join_date' => now(),
            'phone' => "098765432199",
            'approved_by' => 11,
            'approved_at' => now(),
            'code_order_id' => "$code3",
            'gross_amount' => 10000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $code4 = Join::JOINCODE . \uniqid() . '-' . \rand() . '-' ./*gross_amount*/ 10000 . /*team_id*/ 3 ./*event_id*/ 1 ./*approved_by*/ 16;
        DB::table('joins')->insert([
            'team_id' => 4,
            'event_id' => 2,
            'join_date' => now(),
            'phone' => "098765432199",
            'approved_by' => 16,
            'approved_at' => now(),
            'code_order_id' => "$code4",
            'gross_amount' => 10000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
