@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Tipo de Situação
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/tiposituacao" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="tiposdesituacao-descricao" class="col-sm-3 control-label">Descrição</label>

                            <div class="col-sm-6">
                                <input type="text" name="descricao" id="tiposdesituacao-descricao" class="form-control" value="{{ old('tiposdesituacao') }}">
                            </div>
                        </div>


                        <!-- Add Button -->
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
            @if (count($tiposdesituacao) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tipos de Situação Gravadas
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped tiposdesituacao-table">
                            <thead>
                                <th>Descrição</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tiposdesituacao as $tiposituacao)
                                    <tr>
                                        <td class="table-text"><div>{{ $tiposituacao->descricao }}</div></td>

                                        <!-- Delete Button -->
                                        <td>
                                            <form action="/tiposituacao/{{ $tiposituacao->id }}" method="POST">
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
