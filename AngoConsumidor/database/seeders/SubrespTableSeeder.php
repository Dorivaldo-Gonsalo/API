<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubrespTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('subresp')->insert([
            [
                'id_resp' => 1,
                'texto' => 'Sempre ótimos!',
                'classific' => 5
            ],
            // Adicione as outras sub-respostas conforme desejado
        ]);
    }
}
