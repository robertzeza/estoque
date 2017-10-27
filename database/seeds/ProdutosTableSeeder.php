<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)', array('Geladeira', 2, 590.00, 'Side by Side com gelo na porta'));
        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)', array('Fogão', 5, 95.00, 'Painel automático e forno elétrico'));
        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)', array('Microondas', 1, 152.00, 'Manda SMS quando termina de esquentar'));
    }
}
