<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsuariosTableSeeder::class,
            RepresentantesTableSeeder::class,
            CategoriasTableSeeder::class,
            EmpresasTableSeeder::class,
            EmpresaCategoriaTableSeeder::class,
            CriticasTableSeeder::class,
            RespostasTableSeeder::class,
            SubrespTableSeeder::class,
        ]);
    }
}
