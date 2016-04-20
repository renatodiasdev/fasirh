@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Funcionario
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/funcionarios/salvar" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">

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
                                <input type="text" class="form-control" name="sexo" value="{{ old('sexo') }}">

                                @if ($errors->has('sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nascimento</label>

                            <div class="col-md-3">
                                <input type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}">

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
                                <input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}">

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
                                <input type="text" class="form-control" name="rg" value="{{ old('rg') }}">

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
                                <input type="text" class="form-control" name="ctps" value="{{ old('ctps') }}">

                                @if ($errors->has('ctps'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ctps') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cargo</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="cargo" value="{{ old('cargo') }}">

                                @if ($errors->has('cargo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('setor') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Setor</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="setor" value="{{ old('setor') }}">

                                @if ($errors->has('setor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('setor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('unidade') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Unidade</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unidade" value="{{ old('unidade') }}">

                                @if ($errors->has('unidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('admissao') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Data de Admissão</label>

                            <div class="col-md-3">
                                <input type="date" class="form-control" name="admissao" value="{{ old('admissao') }}">

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
                                <input type="date" class="form-control" name="saida" value="{{ old('saida') }}">

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
                                    <i class="fa fa-btn fa-plus"></i>Novo Funcionario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
