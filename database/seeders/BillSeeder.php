<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bills')->insert([
            'user_id' => 1,
            'bill_type_id' => 2,
            'nominal' => 200,
            'status' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'user_id' => 1,
            'bill_type_id' => 4,
            'nominal' => 300,
            'status' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
