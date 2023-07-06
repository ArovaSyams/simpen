<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthlySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('monthlies')->insert([
            'user_id' => 1,
            'monthly_type_id' => 2,
            'nominal' => 1200,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('monthlies')->insert([
            'user_id' => 1,
            'monthly_type_id' => 4,
            'nominal' => 1000,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
