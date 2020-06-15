<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'name' => 'Armar Pilas',
            ],
            [
                'name' => 'Pilas Creadas',
            ],
            [
                'name' => 'Balance',
            ],
            [
                'name' => 'Producto',
            ]
        ]);
    }
}
