<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        $this->createUser();
    }

    private function createAdmin()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'phone' => rand(0, 1),
            'dob' => '',
            'user_type' => '1',
            'password' => Hash::make('12345678'),
        ]);


        $user->createWallet(
            [
                'name' => 'Litecoin',
                'slug' => 'ltc-'.$user->generateRandomString(34),
                'image' => 'images/ltc.png',
                'meta' => ['currency' => 'LTC'],
            ]);
        $user->createWallet(
            [
                'name' => 'USDT (USD Omni)',
                'slug' => 'usdt-'.$user->generateRandomString(42),
                'image' => 'images/usdt.png',
                'meta' => ['currency' => 'USDT'],
            ]);
    }

    private function createUser()
    {
        $user = User::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'phone' => rand(0, 1),
            'dob' => '',
            'password' => Hash::make('12345678'),
        ]);


        $user->createWallet(
            [
                'name' => 'Litecoin',
                'slug' => 'ltc-'.$user->generateRandomString(34),
                'image' => 'images/ltc.png',
                'meta' => ['currency' => 'LTC'],
            ]);
        $user->createWallet(
            [
                'name' => 'USDT (USD Omni)',
                'slug' => 'usdt-'.$user->generateRandomString(42),
                'image' => 'images/usdt.png',
                'meta' => ['currency' => 'USDT'],
            ]);
    }
}
