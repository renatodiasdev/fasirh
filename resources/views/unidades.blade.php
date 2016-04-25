@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nova Unidade
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/unidades" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="unidade-nome" class="col-sm-3 control-label">Nome</label>

                            <div class="col-sm-6">
                                <input type="text" name="nome" id="unidade-nome" class="form-control" value="{{ old('unidades') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="unidade-endereco" class="col-sm-3 control-label">Endereço</label>

                            <div class="col-sm-9">
                                <input type="text" name="endereco" id="unidade-endereco" class="form-control" value="{{ old('unidades') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="unidade-bairro" class="col-sm-3 control-label">Bairro</label>

                            <div class="col-sm-6">
                                <input type="text" name="bairro" id="unidade-bairro" class="form-control" value="{{ old('unidades') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="unidade-cidade" class="col-sm-3 control-label">Cidade</label>

                            <div class="col-sm-6">
                                <input type="text" name="cidade" id="unidade-cidade" class="form-control" value="{{ old('unidades') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="unidade-uf" class="col-sm-3 control-label">UF</label>

                            <div class="col-sm-2">
                                <input type="text" name="uf" id="unidade-uf" class="form-control" value="{{ old('unidades') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Nova Unidade
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($unidades) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Unidades Gravadas
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped unidade-table">
                            <thead>
                                <th>Nome</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($unidades as $unidade)
                                    <tr>
                                        <td class="table-text"><div>{{ $unidade->nome }}</div></td>
                                        <td class="table-text"><div>{{ $unidade->bairro }}</div></td>
                                        <td class="table-text"><div>{{ $unidade->cidade }}</div></td>
                                        <td class="table-text"><div>{{ $unidade->uf }}</div></td>



                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/unidade/{{ $unidade->id }}" method="POST">
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
