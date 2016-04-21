<?php

use Illuminate\Database\Seeder;

class setorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setores')->insert([
          'nome' => 'setor 1',
          'empresa_id' => '1',
        ]);
    }
}
