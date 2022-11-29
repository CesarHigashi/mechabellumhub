<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConflictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conflicts')->insert([
            'name' => 'Segunda Guerra Mundial',
            'start_year' => '1939',
            'end_year' => '1945',
            'description' => 'Pasado de lanza el austriaco',
        ]);
        DB::table('conflicts')->insert([
            'name' => 'Guerra de Corea',
            'start_year' => '1950',
            'end_year' => '1953',
            'description' => 'Pasados de lanza los comunistas',
        ]);
        DB::table('conflicts')->insert([
            'name' => 'Guerra de Vietnam',
            'start_year' => '1955',
            'end_year' => '1975',
            'description' => 'Pasados de lanza los arboles',
        ]);
    }
}
