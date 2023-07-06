<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bills = ['Rumah', 'Gas', 'Listrik', 'WIFI', 'Aidat', 'Kas PPI'];

        foreach ($bills as $b) {
            DB::table('bill_types')->insert([
                'bill_type' => $b,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

    }
}
