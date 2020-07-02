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
                'id' => 1,
                'name' => 'Viajes',
            ],
            [
                'id' => 2,
                'name' => 'Vehiculos',
            ],
            [
                'id' => 3,
                'name' => 'Asistencia',
            ],
            [
                'id' => 4,
                'name' => 'Empleados',
            ],
            [
                'id' => 5,
                'name' => 'Empresas',
            ],
            [
                'id' => 6,
                'name' => 'Ingreso de Comensales',
            ],
            [
                'id' => 7,
                'name' => 'Control de Comensales',
            ],
            [
                'id' => 8,
                'name' => 'Planta - Producto',
            ],
            [
                'id' => 9,
                'name' => 'Planta - Stock de Productos',
            ],
            [
                'id' => 10,
                'name' => 'Planta - Balance',
            ],
            [
                'id' => 11,
                'name' => 'Planta - Parametros',
            ],
            [
                'id' => 12,
                'name' => 'Planta - Lotes en Pila',
            ],
            [
                'id' => 13,
                'name' => 'Planta - Lotes para Pila',
            ],
            [
                'id' => 14,
                'name' => 'Microbalanza',
            ],
            [
                'id' => 15,
                'name' => 'Empleados Check',
            ]
        ]);
    }
}
