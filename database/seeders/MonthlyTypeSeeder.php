<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthlyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monthlies = ['Iuran Rumah', 'Perawatan', 'Transport', 'Shodaqoh', 'Yemekhane'];

        foreach ($monthlies as $monthly) {
            DB::table('monthly_types')->insert([
                'monthly_type' => $monthly,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
