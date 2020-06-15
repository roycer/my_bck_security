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
                'password' => Hash::make('rcordova|SYS01')
            ],
            [
                'username' => 'comedor',
                'password' => Hash::make('comedor-C001')
            ],
            [
                'username' => 'soporte',
                'password' => Hash::make('soporte|SYS01')
            ],
            [
                'username' => 'planta',
                'password' => Hash::make('Planta-2020')
            ],
            [
                'username' => 'ebruno',
                'password' => Hash::make('e123456')
            ],
            [
                'username' => 'yoselin',
                'password' => Hash::make('aten-2001')
            ],
            [
                'username' => 'emmy',
                'password' => Hash::make('aten-2002')
            ]
        ]);
    }
}
