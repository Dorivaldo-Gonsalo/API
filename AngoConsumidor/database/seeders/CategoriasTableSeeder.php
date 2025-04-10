<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nome' => 'Tecnologia'],
            ['nome' => 'Saúde'],
            ['nome' => 'Educação'],
            ['nome' => 'Alimentos'],
            ['nome' => 'Transportes'],
        ]);
    }
}
