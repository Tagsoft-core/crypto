<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => 'Tether(USDT)',
            'code' => 'USDT',
            'image' => 'images/usdt.png',
            'exchange_rate' => '144.341490'
        ]);

        DB::table('currencies')->insert([
            'name' => 'Litecoin',
            'code' => 'LTC',
            'image' => 'images/ltc.png',
            'exchange_rate' => '0.006928'
        ]);
    }
}
