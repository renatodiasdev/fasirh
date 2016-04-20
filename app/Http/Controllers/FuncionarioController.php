<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class FuncionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function buscar(Request $request)
   {
     return view('/buscar');
   }

   public function PostBusca(Request $request)
   {

     $nome = $request->nome;
     $funcionarios = Funcionario::where('nome', 'LIKE', '%'.$nome.'%')->get();
    //$funcionarios = DB::select('select * from funcionarios where nome = :nome ', ['nome' => $nome]);
    if (count($funcionarios) > 0)
    {
      return View('/resultado', ['funcionarios' => $funcionarios]);
    }
    else {
      return redirect('/buscar');
    }

   }

   public function editar($id)
   {
     $funcionario = Funcionario::findOrFail($id);
     return view('/editar', compact('funcionario'));
   }

   public function PostEditar(Request $request)
   {
     $this->validate($request, [
       'nome' => 'required|max:50',
       'sexo' => 'required|max:10',
       'nascimento' => 'required|date',
       'cpf'  => 'required',
       'rg'   => 'required',
       'ctps' => 'required',
       'cargo' => 'required|max:20',
       'setor' => 'required|max:20',
       'unidade' => 'required|max:20',
       'admissao' => 'required|date',
     ]);
     $func = Funcionario::find($request->id);
     $func->nome = $request->nome;
     $func->sexo = $request->sexo;
     $func->nascimento = $request->nascimento;
     $func->cpf = $request->cpf;
     $func->rg = $request->rg;
     $func->ctps = $request->ctps;
     $func->cargo = $request->cargo;
     $func->setor = $request->setor;
     $func->unidade = $request->unidade;
     $func->admissao = $request->admissao;
     $func->saida = $request->saida;
     $func->save();

     return redirect('/buscar');
   }

    public function funcionario(Request $request)
    {
      return view('/funcionario');
      $nome = $request->nome;
    }

    public function salvar(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required|max:50',
        'sexo' => 'required|max:10',
        'nascimento' => 'required|date',
        'cpf'  => 'required',
        'rg'   => 'required',
        'ctps' => 'required',
        'cargo' => 'required|max:20',
        'setor' => 'required|max:20',
        'unidade' => 'required|max:20',
        'admissao' => 'required|date',
      ]);

      $funcionario = new Funcionario;
      $funcionario->nome = $request->nome;
      $funcionario->sexo = $request->sexo;
      $funcionario->nascimento = $request->nascimento;
      $funcionario->cpf = $request->cpf;
      $funcionario->rg = $request->rg;
      $funcionario->ctps = $request->ctps;
      $funcionario->cargo = $request->cargo;
      $funcionario->setor = $request->setor;
      $funcionario->unidade = $request->unidade;
      $funcionario->admissao = $request->admissao;
      $funcionario->save();

      return redirect('/buscar');
    }

    public function delete($id)
    {
      Funcionario::findOrFail($id)->delete();
      return redirect('/buscar');
    }

}
