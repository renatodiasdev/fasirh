<?php

use Illuminate\Database\Seeder;

class empresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
          'nome' => 'EMPRESA A',
          'cnpj' => '11122233344455566699',
          'email' => 'empresaa@email.com',
          'telefone' => '2222-3333',
        ]);
    }
}
