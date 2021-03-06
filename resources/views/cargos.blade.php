@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Cargo
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/cargo" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="cargo-nome" class="col-sm-3 control-label">Nome</label>

                            <div class="col-sm-6">
                                <input type="text" name="nome" id="unidade-nome" class="form-control" value="{{ old('cargos') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Novo Cargo
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($cargos) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cargos Gravados
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped cargo-table">
                            <thead>
                                <th>Nome</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($cargos as $cargo)
                                    <tr>
                                        <td class="table-text"><div>{{ $cargo->nome }}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/cargo/{{ $cargo->id }}" method="POST">
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
