@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Relatório de Integralização por Turma</h1>
    <div class="mt-4">
        <p><strong>Turma:</strong> {{ $numTurma }}</p>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Alunos</th>
                <th>Disciplinas Faltando</th>
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($alunosComDisciplinasNaoCursadas as $data)
                <tr>
                    <td>{{ $data['aluno']->cpf }}</td>
                    <td>{{ $data['aluno']->nome }}</td>
                    <td>{{ count($data['disciplinasNaoCursadas']) }}</td>
                    <td>
                        
                        <button class="btn btn-info btn-sm" onclick="toggleDisciplinas({{ $data['aluno']->id }})">Mostrar Disciplinas Faltando</button>
                    </td>
                </tr>

                <tr id="disciplinas-{{ $data['aluno']->id }}" style="display:none;">
                    <td colspan="4">
                        <ul>
                            @foreach($data['disciplinasNaoCursadas'] as $disciplina)
                                <li>{{ $disciplina->nome }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Função para mostrar/esconder disciplinas faltando
    function toggleDisciplinas(alunoId) {
        var row = document.getElementById('disciplinas-' + alunoId);
        if (row.style.display === 'none') {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    }
</script>
@endsection
