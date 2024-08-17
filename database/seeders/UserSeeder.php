<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'     => 'admin',
                'name'     => 'admin',
                'alamat'     => 'this is address',
                'email'    => 'admin@gmail.com',
                'password'     => Hash::make('admin'),
                'role'          => 'admin',
                'nomor_hp' =>  '082340922344',
            ],
            [
                'username'     => 'user1',
                'alamat'     => 'this is address',
                'name'     => 'User Dummy',
                'email'    => 'user1@gmail.com',
                'password'     => Hash::make('user1'),
                'role'          => 'user',
                'nomor_hp' =>  '085763942394',
            ]
        ]);
    }
}
