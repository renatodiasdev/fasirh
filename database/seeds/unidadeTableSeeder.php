<?php

use Illuminate\Database\Seeder;

class unidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
          'nome' => 'unidade 1',
          'endereco' => 'rua a numero 1',
          'cidade' => 'são gonçalo',
          'bairro' => 'centro',
          'uf' => 'RJ',
        ]);
    }
}
