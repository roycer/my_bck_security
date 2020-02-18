<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'roycer',
                'password' => Hash::make('roycer2018')
            ],
            [
                'username' => 'operador',
                'password' => Hash::make('123456')
            ],
            [
                'username' => 'soporte',
                'password' => Hash::make('Soporte2018')
            ]
        ]);
    }
}
