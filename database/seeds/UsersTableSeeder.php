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
                'username' => 'admin',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'gerencia',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'planta',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'administracion',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'acliente',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'comedor',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'soporte',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'lquimico',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'canchas',
                'password' => Hash::make('mysac')
            ],
            [
                'username' => 'liquidacion',
                'password' => Hash::make('mysac')
            ]
        ]);
    }
}
