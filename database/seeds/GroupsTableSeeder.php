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
                'name' => 'ADMIN',
            ],
            [
                'name' => 'PLANTA',
            ],
            [
                'name' => 'ATENCION AL CLIENTE',
            ],
            [
                'name' => 'COMEDOR',
            ],
            [
                'name' => 'ADMINISTRACION',
            ],
            [
                'name' => 'CONTRATAS',
            ]
        ]);
    }
}
