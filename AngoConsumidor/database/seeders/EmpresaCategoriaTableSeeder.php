<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaCategoriaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('empresa_categoria')->insert([
            [
                'id_empresa' => 1,
                'id_categoria' => 1
            ],  // Empresa A em Tecnologia
            [
                'id_empresa' => 2,
                'id_categoria' => 2
            ],  // Empresa B em Saúde

        ]);
    }
}
