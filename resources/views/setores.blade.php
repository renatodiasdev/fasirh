@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo setor
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/setores" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="setor-nome" class="col-sm-3 control-label">Nome</label>

                            <div class="col-sm-6">
                                <input type="text" name="nome" id="unidade-nome" class="form-control" value="{{ old('setores') }}">
                            </div>
                        </div>



                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Novo Setor
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($setores) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Setores Gravados
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped setor-table">
                            <thead>
                                <th>Nome</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($setores as $setor)
                                    <tr>
                                        <td class="table-text"><div>{{ $setor->nome }}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/setor/{{ $setor->id }}" method="POST">
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
