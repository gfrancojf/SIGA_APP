<?php

namespace Database\Seeders;


use App\Models\branches;
use App\Models\location;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        branches::create([
            'name' =>  'C.A HIDROLOGICA VENEZOLANA'
        ]);

        branches::create([
            'name' =>  'MINISTERIO DEL PODER POPULAR PARA ATENCION DE LAS AGUAS - MINAGUAS'
        ]);


    }
}
