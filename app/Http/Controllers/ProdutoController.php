<?php

namespace estoque\Http\Controllers;

use estoque\Http\Requests\ProdutosRequest;
use Validator;
use Request;
use estoque\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => ['adiciona','remove']]);
    }

    public function lista()
    {
        $produtos = Produto::all();
        if (view()->exists('produto.listagem')) {
            return view('produto.listagem')->with('produtos', $produtos);
        }
    }

    public function mostra($id)
    {


        $resposta = Produto::find($id);
        if (empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta);
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request)
    {
        Produto::create($request::all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));

    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return $produtos;
    }
    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('ProdutoController@lista');
    }

    public function altera($id)
    {
        $produto = Produto::find($id);
        return view('produto.formularioEdit')->with('produto',$produto);
    }

    public function edita()
    {
        $id = Request::input('id');

        $produto = Produto::find($id);
        $produto->nome = Request::input('nome');
        $produto->descricao = Request::input('descricao');
        $produto->valor = Request::input('valor');
        $produto->quantidade = Request::input('quantidade');
        $produto->save();
        //$produto = Request::all();
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));

    }
}
