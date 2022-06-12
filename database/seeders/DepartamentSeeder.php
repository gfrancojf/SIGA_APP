<?php

namespace Database\Seeders;

use App\Models\Departaments;

use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE TECNOLOGIA'
        ]);
        
        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE RRHH'
        ]);

        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE PROYECTO'
        ]);

        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE PLANIFICACION PRESUPUESTARIA'
        ]);
        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE CONSULTORIA JURIDICA'
        ]);
        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE FORTALECIMIENTO'
        ]);
        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE POLITICAS PUBLICAS'
        ]);
        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE AUDITORIA'
        ]);
        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE PATRIMONIO'
        ]);

        Departaments::create([
            'name' =>  'GERENCIA GENERAL DE INFRAESTRUCTURA Y SERVICIOS'
        ]);




    }
}
