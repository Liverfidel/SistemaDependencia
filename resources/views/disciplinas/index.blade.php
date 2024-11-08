@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Disciplinas</h1>
    <a href="{{ route('disciplinas.create') }}" class="btn btn-primary mb-3">Adicionar Disciplina</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Carga Horária</th>
                <th>Semestre</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->nome }}</td>
                    <td>{{ $disciplina->cargaHorario }}</td>
                    <td>{{ $disciplina->semestre }}</td>
                    <td>
                        <a href="{{ route('disciplinas.edit', $disciplina) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('disciplinas.destroy', $disciplina) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
