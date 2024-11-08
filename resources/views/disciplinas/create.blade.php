@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Disciplina</h1>
    <form action="{{ route('disciplinas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="cargaHorario" class="form-label">Carga Horária</label>
            <input type="number" class="form-control" id="cargaHorario" name="cargaHorario" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" class="form-control" id="semestre" name="semestre" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
