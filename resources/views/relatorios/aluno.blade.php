@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Relatório por Aluno</h2>
    <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
    <p><strong>Semestre Atual:</strong> {{ $aluno->periodo_ingresso }}</p>
    
    <h4>Disciplinas Faltando</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Semestre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplinasFaltando as $disciplina)
                <tr>
                    <td>{{ $disciplina->nome }}</td>
                    <td>{{ $disciplina->semestre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <h4>Disciplinas Já Aprovadas</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Semestre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplinasAprovadas as $disciplina)
                <tr>
                    <td>{{ $disciplina->nome }}</td>
                    <td>{{ $disciplina->semestre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
    