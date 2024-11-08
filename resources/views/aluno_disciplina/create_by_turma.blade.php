@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Disciplinas Aprovadas por Turma</h1>
    <form action="{{ route('aluno_disciplina.storeByTurma') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="numTurma" class="form-label">Selecione o Número da Turma</label>
            <select name="numTurma" id="numTurma" class="form-select">
                @foreach($turmas as $turma)
                    <option value="{{ $turma->numTurma }}">{{ $turma->numTurma }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="disciplina_id" class="form-label">Selecione a Disciplina</label>
            <select name="disciplina_id" id="disciplina_id" class="form-select">
                @foreach($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection
