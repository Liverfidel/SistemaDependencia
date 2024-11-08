@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Relatório por Disciplina</h2>
    <p><strong>Nome:</strong> {{ $disciplina->nome }}</p>
    <p><strong>Semestre Disciplina:</strong> {{ $disciplina->semestre }}º</p>
    
    <h4>Alunos que ainda não cursaram</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Aluno</th>
                <th>Semestre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alunosEmDependencia as $aluno)
                <tr>
                    <td>{{ $aluno->cpf }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->periodo_ingresso}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nenhum aluno em DP para esta disciplina</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
