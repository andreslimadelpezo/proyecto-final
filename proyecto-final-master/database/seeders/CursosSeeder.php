<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert(
            ['cur_titulo'=>'informatica basica',
            'cur_descripcion'=>'informatica facilita',
            'cur_grupo'=>'tecnologia',
            'cur_estado'=>1,
            'created_at'=>date('Y-m-d'),
        ]);

        DB::table('cursos')->insert(
            ['cur_titulo'=>'dibujo modulo 1',
            'cur_descripcion'=>'informatica facilita',
            'cur_grupo'=>'tecnologia',
            'cur_estado'=>1,
            'created_at'=>date('Y-m-d'),
        ]);
        DB::table('cursos')->insert([
            'cur_titulo' => 'Desarrollo Web Full Stack',
            'cur_descripcion' => 'Aprende a desarrollar aplicaciones web desde el frontend hasta el backend.',
            'cur_grupo' => 'Programación',
            'cur_estado' => 1,
            'created_at' => now(),
        ]);
        
        DB::table('cursos')->insert([
            'cur_titulo' => 'Marketing Digital Avanzado',
            'cur_descripcion' => 'Domina las estrategias avanzadas de marketing digital para impulsar tu presencia en línea.',
            'cur_grupo' => 'Marketing',
            'cur_estado' => 1,
            'created_at' => now(),
        ]);
        
        DB::table('cursos')->insert([
            'cur_titulo' => 'Introducción a la Inteligencia Artificial',
            'cur_descripcion' => 'Descubre los conceptos fundamentales de la inteligencia artificial y su aplicación en la vida real.',
            'cur_grupo' => 'Tecnología',
            'cur_estado' => 1,
            'created_at' => now(),
        ]);
        
        DB::table('cursos')->insert([
            'cur_titulo' => 'Diseño Gráfico para Redes Sociales',
            'cur_descripcion' => 'Crea contenido visual atractivo y efectivo para las redes sociales.',
            'cur_grupo' => 'Diseño',
            'cur_estado' => 1,
            'created_at' => now(),
        ]);
    }
}
