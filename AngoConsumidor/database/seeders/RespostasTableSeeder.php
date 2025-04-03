<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RespostasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('respostas')->insert([
            [
                'texto' => 'Agradecemos seu feedback!',
                'classific' => 5,
                'id_critica' => 1
            ],
            [
                'texto' => 'É um prazer ajudar!',
                'classific' => 5,
                'id_critica' => 2
            ],
            // Adicione as outras respostas conforme desejado
        ]);
    }
}
