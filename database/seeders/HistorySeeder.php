<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('histories')->insert([
            'user_id' => 1,
            'bill_type_id' => 2, 
            'bill_id' => 2,
            'monthly_type_id' => 1,
            'monthly_id' => 1,
            'total' => 220,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('histories')->insert([
            'user_id' => 1,
            'bill_type_id' => 1,
            'bill_id' => 1,
            'monthly_type_id' => 2,
            'monthly_id' => 2,
            'total' => 1200,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('histories')->insert([
            'user_id' => 1,
            'bill_type_id' => 1,
            'bill_id' => 1,
            'monthly_type_id' => 3,
            'monthly_id' => 2,
            'total' => 1200,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
