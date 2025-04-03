<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentantesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('representantes')->insert([
            [
                'nome' => 'Mikel',
                'apelido' => 'Kudiodia',
                'bi' => '002316509LA01',
                'sector' => 'Vendas',
                'email' => 'mikelkudiodia@gmail.com',
                'senha' => bcrypt('mikel1234'),
                'caminho_imagem' => 'C:\\Users\\Família Gonçalo\\Pictures\\Nova pasta\\img1.jpg'
            ],
            [
                'nome' => 'Dorivaldo',
                'apelido' => 'Gonçalo',
                'bi' => '002316509LA11',
                'sector' => 'RH',
                'email' => 'dorivaldogoncalo@gmail.com',
                'senha' => bcrypt('dorivaldo1234'),
                'caminho_imagem' => 'C:\\Users\\Família Gonçalo\\Pictures\\Nova pasta\\img1.jpg'
            ],
            // Adicione os outros representantes conforme desejado
        ]);
    }
}
