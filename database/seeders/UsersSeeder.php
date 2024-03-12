<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'rol_id'=>1,
            'name'=>'superAdmin',
            'usu_nombres'=>'diego',
            'usu_telefono'=>'1234567891',
            'email'=>'diegoandreslima@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        DB::table('users')->insert([
            'rol_id'=>3,
            'name'=>'pepe',
            'usu_nombres'=>'pepe perez',
            'usu_telefono'=>'1234567887',
            'email'=>'pepito@gmail.com',
            'password'=>bcrypt('pepito123')
        ]);

        DB::table('users')->insert([
            'rol_id'=>3,
            'name'=>'juan',
            'usu_nombres'=>'juan perez',
            'usu_telefono'=>'1234567887',
            'email'=>'j@gmail.com',
            'password'=>bcrypt('pepito123')
        ]);
 
    }
}
