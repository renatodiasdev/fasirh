<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Funcionario;
use App\Unidade;
use App\Setor;
use App\Cargo;
use App\tiposituacao;
use App\situacaofuncional;
use Illuminate\Support\Facades\Auth;
use DB;

class SituacaoFuncionalController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function situacoesporunidade($unidade_id)
  {
    $situacoesporunidade = DB::table('funcionarios')
                           ->join('situacaofuncional','funcionarios.id','=','situacaofuncional.funcionario_id')
                           ->join('unidades','situacaofuncional.unidade_id','=','unidades.id')
                           ->join('setores','situacaofuncional.setor_id','=','setores.id')
                           ->join('cargos','situacaofuncional.cargo_id','=','cargos.id')
                           ->join('tiposituacao','situacaofuncional.situacao_id','=','tiposituacao.id')
                           ->select('funcionarios.*','unidades.nome','setores.nome','cargos.nome','tiposituacao.descricao','situacaofuncional.inicio','situacaofuncional.final','situacaofuncional.indisponivel')
                           ->where('situacaofuncional.unidade_id',$unidade_id)
                           ->orderBy('inicio','desc')
                           ->get();

    return view('/situacoesporunidade', compact('situacoesporunidade'));
  }

  public function editar($id)
  {
    $situacaodofuncionario = situacaofuncional::findOrFail($id);
    return view('/editar', compact('situacaodofuncionario'));
  }

  public function novasituacao($id)
  {
    $funcionario = funcionario::findOrFail($id);
    $unidades = unidade::where('empresa_id',Auth::user()->empresa_id)->orderBy('nome')->pluck('nome','id');
    $setores = setor::where('empresa_id',Auth::user()->empresa_id)->orderBy('nome')->pluck('nome','id');
    $cargos  = cargo::where('empresa_id',Auth::user()->empresa_id)->orderBy('nome')->pluck('nome','id');
    $situacoes = tiposituacao::where('empresa_id',Auth::user()->empresa_id)->orderBy('descricao')->pluck('descricao','id');
    $situacoesporfuncionario = DB::table('funcionarios')
                           ->join('situacaofuncional','funcionarios.id','=','situacaofuncional.funcionario_id')
                           ->join('unidades','situacaofuncional.unidade_id','=','unidades.id')
                           ->join('setores','situacaofuncional.setor_id','=','setores.id')
                           ->join('cargos','situacaofuncional.cargo_id','=','cargos.id')
                           ->join('tiposituacao','situacaofuncional.situacao_id','=','tiposituacao.id')
                           ->select('situacaofuncional.id','situacaofuncional.funcionario_id','funcionarios.matricula','funcionarios.nome','unidades.nome','setores.nome','cargos.nome','tiposituacao.descricao','situacaofuncional.inicio','situacaofuncional.final','situacaofuncional.indisponivel')
                           ->where('situacaofuncional.funcionario_id',$funcionario->id)
                           ->orderBy('inicio','desc')
                           ->get();
    return view('/novasituacao')
    ->with('funcionario',$funcionario)
    ->with('unidades',$unidades)
    ->with('setores',$setores)
    ->with('cargos',$cargos)
    ->with('situacoes',$situacoes)
    ->with('situacoesporfuncionario',$situacoesporfuncionario);
  }

  public function salvar(Request $request)
  {
    $situacaofuncional = new situacaofuncional;
    $situacaofuncional->empresa_id = Auth::user()->empresa_id;
    $situacaofuncional->funcionario_id = $request->funcionario_id;
    $situacaofuncional->unidade_id = $request->unidade_id;
    $situacaofuncional->setor_id = $request->setor_id;
    $situacaofuncional->cargo_id = $request->cargo_id;
    $situacaofuncional->situacao_id = $request->situacao_id;
    $situacaofuncional->inicio = $request->inicio;
    $situacaofuncional->final = $request->final;
    $situacaofuncional->indisponivel = $request->indisponivel;
    $situacaofuncional->save();

    return redirect('/situacao/novasituacao/' . $situacaofuncional->funcionario_id);
  }

  public function salvaedicao(Request $request)
  {
    $sitfunc = situacaofuncional::find($request->id);
    $sitfunc->empresa_id = Auth::user()->empresa_id;
    $sitfunc->funcionario_id = $request->funcionario_id;
    $sitfunc->unidade_id = $request->unidade_id;
    $sitfunc->setor_id = $request->setor_id;
    $sitfunc->cargo_id = $request->cargo_id;
    $$sitfuncfunc->situacao_id = $request->situacao_id;
    $sitfunc->inicio = Input::get('inicio') ?: null;
    $sitfunc->final = Input::get('final') ?: null;
    $sitfunc->indisponivel = $request->indisponivel;
    $sitfunc->save();

    return redirect('/funcionarios/buscar');
  }

  public function apagar($id)
  {
    $sitfunc = situacaofuncional::findOrFail($id);
    situacaofuncional::findOrFail($id)->delete();
    return redirect('/situacao/novasituacao/' . $sitfunc->funcionario_id);
  }
}
