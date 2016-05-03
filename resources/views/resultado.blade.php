@extends('layouts.app')

@section('content')
    <div class="container">

            <!-- Current Tasks -->
            @if (count($funcionarios) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Funcionários
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped funcionario-table">
                            <thead>
                                <th>Nome</th>
                                <th>Matrícula</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($funcionarios as $funcionario)
                                    <tr>
                                        <td class="table-text"><div>{{ $funcionario->nome }}</div></td>
                                        <td class="table-text"><div>{{ $funcionario->matricula }}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/funcionarios/delete/{{ $funcionario->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Apagar
                                                </button>

                                                <a class="btn btn-link" href="{{ URL::to('/funcionarios/editar/' . $funcionario->id) }}">Editar</a>
                                                <a class="btn btn-link" href="{{ URL::to('/situacao/novasituacao/' . $funcionario->id) }}">Situação</a>
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
@endsection
