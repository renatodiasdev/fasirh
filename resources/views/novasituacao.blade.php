@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Incluindo nova situação funcional
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/situacao/salvar" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Matrícula</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="matricula" value="{{ $funcionario->matricula }}">

                                @if ($errors->has('matricula'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('matricula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Task Name -->
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input type=hidden NAME="funcionario_id" value="{{ $funcionario->id }}">
                                <input type="text" class="form-control" name="nome" value="{{ $funcionario->nome }}">

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @include('combosfuncionario')

                        <div class="form-group{{ $errors->has('inicio') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Início</label>

                            <div class="col-md-3">
                                <input type="date" class="form-control" name="inicio" value="">

                                @if ($errors->has('inicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('inicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('final') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Final</label>

                            <div class="col-md-3">
                                <input type="date" class="form-control" name="final" value="">

                                @if ($errors->has('final'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('final') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('indisponivel') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Disponibilidade</label>

                            <div class="col-md-6">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="indisponivel" value="1"> Indisponível para o trabalho
                                  </label>
                              </div>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Nova Situação Funcional
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($situacoesporfuncionario) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Situações Gravadas
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped situacoesporfuncionario-table">
                            <thead>
                                <th>Descrição</th>
                                <th>Início</th>
                                <th>Final</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($situacoesporfuncionario as $situacaoporfuncionario)
                                    <tr>
                                        <td class="table-text"><div>{{ $situacaoporfuncionario->descricao }}</div></td>
                                        <td class="table-text"><div>{{{ $situacaoporfuncionario->inicio != '0000-00-00' ? date('d/m/Y',strtotime($situacaoporfuncionario->inicio)) : ''}}}</div></td>
                                        <td class="table-text"><div>{{{ $situacaoporfuncionario->final != '0000-00-00' ? date('d/m/Y',strtotime($situacaoporfuncionario->final)) : ''}}}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/situacao/apagar/{{ $situacaoporfuncionario->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Apagar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
