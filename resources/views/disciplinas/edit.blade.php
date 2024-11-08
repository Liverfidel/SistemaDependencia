@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Disciplina</h1>
    <form action="{{ route('disciplinas.update', $disciplina) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $disciplina->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="cargaHorario" class="form-label">Carga Horária</label>
            <input type="number" class="form-control" id="cargaHorario" name="cargaHorario" value="{{ $disciplina->cargaHorario }}" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" class="form-control" id="semestre" name="semestre" value="{{ $disciplina->semestre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
