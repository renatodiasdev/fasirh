<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\unidade;
use App\setor;
use App\cargo;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Auth;

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
      return redirect('/funcionarios/buscar');
    }

   }

   public function editar($id)
   {
     $funcionario = Funcionario::findOrFail($id);
     $empresa_id = Auth::user()->empresa_id;
     $unidades = unidade::where('empresa_id',$empresa_id)->orderBy('nome')->pluck('nome','id');
     $setores = setor::where('empresa_id',$empresa_id)->orderBy('nome')->pluck('nome','id');
     $cargos  = cargo::where('empresa_id',$empresa_id)->orderBy('nome')->pluck('nome','id');
     return view('/editar', compact('funcionario'))
     ->with('unidades',$unidades)
     ->with('setores',$setores)
     ->with('cargos',$cargos);
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
       'admissao' => 'required|date',
     ]);
     $func = Funcionario::find($request->id);
     $func->matricula = $request->matricula;
     $func->nome = $request->nome;
     $func->sexo = $request->sexo;
     $func->nascimento = $request->nascimento;
     $func->cpf = $request->cpf;
     $func->rg = $request->rg;
     $func->ctps = $request->ctps;
     $func->unidade_id = $request->unidade_id;
     $func->setor_id = $request->setor_id;
     $func->cargo_id = $request->cargo_id;
     $func->admissao = $request->admissao;
     $func->saida = $request->saida;
     $func->empresa_id = Auth::user()->empresa_id;
     $func->save();

     return redirect('/funcionarios/buscar');
   }

    public function funcionario(Request $request)
    {
      $empresa_id = Auth::user()->empresa_id;
      $unidades = unidade::where('empresa_id',$empresa_id)->orderBy('nome')->pluck('nome','id');
      $setores = setor::where('empresa_id',$empresa_id)->orderBy('nome')->pluck('nome','id');
      $cargos  = cargo::where('empresa_id',$empresa_id)->orderBy('nome')->pluck('nome','id');
      return view('/funcionario')
      ->with('unidades',$unidades)
      ->with('setores',$setores)
      ->with('cargos',$cargos);
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
        'admissao' => 'required|date',
      ]);

      $funcionario = new Funcionario;
      $funcionario->matricula = $request->matricula;
      $funcionario->nome = $request->nome;
      $funcionario->sexo = $request->sexo;
      $funcionario->nascimento = $request->nascimento;
      $funcionario->cpf = $request->cpf;
      $funcionario->rg = $request->rg;
      $funcionario->ctps = $request->ctps;
      $funcionario->unidade_id = $request->unidade_id;
      $funcionario->setor_id = $request->setor_id;
      $funcionario->cargo_id = $request->cargo_id;
      $funcionario->admissao = $request->admissao;
      $funcionario->empresa_id = Auth::user()->empresa_id;
      $funcionario->save();

      return redirect('/funcionarios/buscar');
    }

    public function delete($id)
    {
      Funcionario::findOrFail($id)->delete();
      return redirect('/funcionarios/buscar');
    }

}
