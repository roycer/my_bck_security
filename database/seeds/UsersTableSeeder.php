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
                'id' => 1,
                'username' => 'admin',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 2,
                'username' => 'gerencia',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 3,
                'username' => 'planta',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 4,
                'username' => 'administracion',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 5,
                'username' => 'acliente',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 6,
                'username' => 'comedor',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 7,
                'username' => 'soporte',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 8,
                'username' => 'lquimico',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 9,
                'username' => 'canchas',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 10,
                'username' => 'liquidacion',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 11,
                'username' => 'seguridad',
                'password' => Hash::make('mysac')
            ],
            [
                'id' => 12,
                'username' => 'topico',
                'password' => Hash::make('mysac')
            ]
        ]);
    }
}
