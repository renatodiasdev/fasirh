@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Funcionário
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/funcionarios/posteditar" method="POST" class="form-horizontal">
                        {{ csrf_field() }}


                        <!-- Task Name -->
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <input type=hidden NAME="id" value="{{ $funcionario->id }}">

                            <label class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nome" value="{{ $funcionario->nome }}">

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-3">
                                <select class="form-control" name="sexo">
                                  <option value="Masculino">Masculino</option>
                                  <option value="Feminino">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nascimento</label>

                            <div class="col-md-3">
                                <input type="date" class="form-control" name="nascimento" value="{{ $funcionario->nascimento }}">

                                @if ($errors->has('nascimento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nascimento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CPF</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="cpf" value="{{ $funcionario->cpf }}">

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Identidade</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="rg" value="{{ $funcionario->rg }}">

                                @if ($errors->has('rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ctps') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Carteira Profissional</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="ctps" value="{{ $funcionario->ctps }}">

                                @if ($errors->has('ctps'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ctps') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @include('combosfuncionario')

                        <div class="form-group{{ $errors->has('admissao') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Data de Admissão</label>

                            <div class="col-md-3">
                                <input type="date" class="form-control" name="admissao" value="{{ $funcionario->admissao }}">

                                @if ($errors->has('admissao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admissao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('saida') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Data de Saída</label>

                            <div class="col-md-3">
                                <input type="date" class="form-control" name="saida" value="{{ $funcionario->saida }}">

                                @if ($errors->has('saida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('saida') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-save"></i>Salvar alterações
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
