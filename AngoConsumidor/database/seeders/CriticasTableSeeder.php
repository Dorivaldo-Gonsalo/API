<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriticasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('criticas')->insert([
            [
                'tipo_servico' => 'Atendimento',
                'texto' => 'Ótimo atendimento!',
                'classific' => 5,
                'id_user' => 1,
                'id_emp' => 1
            ],
            [
                'tipo_servico' => 'Consulta',
                'texto' => 'Excelente consulta!',
                'classific' => 5,
                'id_user' => 1,
                'id_emp' => 2
            ],
            // Adicione as outras críticas conforme desejado
        ]);
    }
}
