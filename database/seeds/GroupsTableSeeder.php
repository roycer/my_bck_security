<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'id' => 1,
                'name' => 'ADMIN',
            ],
            [
                'id' => 2,
                'name' => 'PLANTA',
            ],
            [
                'id' => 3,
                'name' => 'ADMINISTRACION',
            ],
            [
                'id' => 4,
                'name' => 'ATENCION AL CLIENTE',
            ],
            [
                'id' => 5,
                'name' => 'COMEDOR',
            ],
            [
                'id' => 6,
                'name' => 'CONTRATAS',
            ],
            [
                'id' => 7,
                'name' => 'LAB QUIMICO',
            ],
            [
                'id' => 8,
                'name' => 'CANCHAS',
            ]
        ]);
    }
}
