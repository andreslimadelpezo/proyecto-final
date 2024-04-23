<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RolesSeeder extends Seeder
{

    public function run(): void
    {
        
        DB::table('roles')->insert(
            ['rol_descripcion'=>'Administrado',
            'estado'=>'activo',
            'created_at'=>date('Y-m-d'),
        ]);

        DB::table('roles')->insert(
            ['rol_descripcion'=>'docente',
            'estado'=>'activo',
            'created_at'=>date('Y-m-d'),
        ]);

        DB::table('roles')->insert(
            ['rol_descripcion'=>'estudiante',
            'estado'=>'activo',
            'created_at'=>date('Y-m-d'),
        ]);
    }
}
