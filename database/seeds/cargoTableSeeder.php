<?php

use Illuminate\Database\Seeder;

class cargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
          'nome' => 'gerente',
          'setor_id' => 1,
          'empresa_id' => 1,
        ]);
    }
}
