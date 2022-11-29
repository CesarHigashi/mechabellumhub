<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nations')->insert([
            'name' => 'Estados Unidos',
            'capital' => 'Washington DC',
            'continent' => 'America',
        ]);
        DB::table('nations')->insert([
            'name' => 'Alemania',
            'capital' => 'Berlin',
            'continent' => 'Europa',
        ]);
        DB::table('nations')->insert([
            'name' => 'Reino Unido',
            'capital' => 'Londres',
            'continent' => 'Europa',
        ]);
        DB::table('nations')->insert([
            'name' => 'Japón',
            'capital' => 'Tokio',
            'continent' => 'Asia',
        ]);
        DB::table('nations')->insert([
            'name' => 'Unión Sovietica',
            'capital' => 'Moscu',
            'continent' => 'Europa',
        ]);
        DB::table('nations')->insert([
            'name' => 'Italia',
            'capital' => 'Roma',
            'continent' => 'Europa',
        ]);
        DB::table('nations')->insert([
            'name' => 'Francia',
            'capital' => 'París',
            'continent' => 'Europa',
        ]);
        DB::table('nations')->insert([
            'name' => 'China',
            'capital' => 'Pekin',
            'continent' => 'Asia',
        ]);
        DB::table('nations')->insert([
            'name' => 'Suecia',
            'capital' => 'Estocolomo',
            'continent' => 'Europa',
        ]);
    }
}
