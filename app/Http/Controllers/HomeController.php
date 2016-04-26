<?php

namespace App\Http\Controllers;

use App\Task;
use App\unidade;
use App\setor;
use App\cargo;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function tasks()
    {
      return view('tasks', [
          'tasks' => Task::orderBy('created_at', 'asc')->get()
      ]);
    }

    public function task(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
      ]);

      $task = new Task;
      $task->name = $request->name;
      $task->save();

      return redirect('/tasks');
    }

    public function taskdelete($id)
    {
      Task::findOrFail($id)->delete();

      return redirect('/tasks');
    }

    public function unidades()
    {
      return view('unidades', [
          'unidades' => unidade::where('empresa_id', Auth::user()->empresa_id)->get()
      ]);
    }

    public function unidade(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required|max:20',
        'endereco' => 'required|max:50',
        'bairro' => 'required|max:20',
        'cidade' => 'required|max:20',
        'uf' => 'required|max:2',
      ]);

      $unidade = new unidade;
      $unidade->nome = $request->nome;
      $unidade->endereco = $request->endereco;
      $unidade->bairro = $request->bairro;
      $unidade->cidade = $request->cidade;
      $unidade->uf = $request->uf;
      $unidade->empresa_id = Auth::user()->empresa_id;
      $unidade->save();

      return redirect('/unidades');
    }

    public function unidadedelete($id)
    {
      unidade::findOrFail($id)->delete();

      return redirect('/unidades');
    }

    public function setores()
    {
      return view('setores', [
          'setores' => setor::where('empresa_id', Auth::user()->empresa_id)->get()
      ]);
    }

    public function setor(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required|max:20',
      ]);

      $setor = new setor;
      $setor->nome = $request->nome;
      $setor->empresa_id = Auth::user()->empresa_id;
      $setor->save();

      return redirect('/setores');
    }

    public function setordelete($id)
    {
      setor::findOrFail($id)->delete();

      return redirect('/setores');
    }

    public function cargos()
    {
      $setores  = setor::where('empresa_id',Auth::user()->empresa_id)->orderBy('nome')->pluck('nome','id');
      return view('cargos', [
          'cargos' => cargo::where('empresa_id', Auth::user()->empresa_id)->get()
      ])->with('setores',$setores);
    }

    public function cargo(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required|max:20',
      ]);

      $cargo = new cargo;
      $cargo->nome = $request->nome;
      $cargo->setor_id = $request->setor_id;
      $cargo->empresa_id = Auth::user()->empresa_id;
      $cargo->save();

      return redirect('/cargos');
    }

    public function cargodelete($id)
    {
      cargo::findOrFail($id)->delete();

      return redirect('/cargos');
    }
}
