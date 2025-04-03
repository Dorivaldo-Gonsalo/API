<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('empresas')->insert([
            [
                'nome' => 'Empresa A',
                'endereco' => 'Av. das Nações, 123',
                'email' => 'contato@empresaA.com',
                'caminho_imagem' => 'C:\\Users\\Família Gonçalo\\Pictures\\Nova pasta\\img1.jpg',
                'senha' => bcrypt('senhaEmpresaA'),
                'id_representante' => 1,
                'telefone' => '912345678',
                'ano_util' => 10
            ],
            [
                'nome' => 'Empresa B',
                'endereco' => 'Av. das Nações, 321',
                'email' => 'contato@empresaB.com',
                'caminho_imagem' => 'C:\\Users\\Família Gonçalo\\Pictures\\Nova pasta\\img1.jpg',
                'senha' => bcrypt('senhaEmpresaB'),
                'id_representante' => 2,
                'telefone' => '912345679',
                'ano_util' => 10
            ],
            // Adicione as outras empresas conforme desejado
        ]);
    }
}
