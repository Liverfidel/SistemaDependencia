@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Aluno</h1>

    <form action="{{ route('alunos.update', $aluno) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $aluno->nome }}" required>
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $aluno->cpf }}" required>
        </div>

        <div class="form-group">
            <label for="numTurma">Número da Turma</label>
            <input type="number" name="numTurma" id="numTurma" class="form-control" value="{{ $aluno->numTurma }}" required>
        </div>

        <div class="form-group">
            <label for="ano_ingresso">Ano de Ingresso</label>
            <input type="number" name="ano_ingresso" id="ano_ingresso" class="form-control" value="{{ $aluno->ano_ingresso }}" required>
        </div>

        <div class="form-group">
            <label for="periodo_ingresso">Período de Ingresso</label>
            <input type="text" name="periodo_ingresso" id="periodo_ingresso" class="form-control" value="{{ $aluno->periodo_ingresso }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
</div>
@endsection
