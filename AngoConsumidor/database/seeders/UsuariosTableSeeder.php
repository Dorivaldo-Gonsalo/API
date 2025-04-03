<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
            'nome' => 'Edivaldo',
            'apelido' => 'Bongo',
            'bi' => '002316509LA05',
            'genero' => 'M',
            'telefone' => '123456789',
            'data_nasc' => '1990-01-01',
            'provincia' => 'Luanda',
            'municipio' => 'Cazenga',
            'email' => 'edivaldobongo@gmail.com',
            'senha' => bcrypt('edivaldo1234'),
            'caminho_imagem' => 'C:\\Users\\Família Gonçalo\\Pictures\\Nova pasta\\img1.jpg'
        ],

        ]);
    }
}
