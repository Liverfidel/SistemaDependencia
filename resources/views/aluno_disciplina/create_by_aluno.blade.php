@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Disciplinas Aprovadas por Aluno</h1>
    <form id="cpfForm" method="POST" action="{{ route('aluno_disciplina.showByCPF') }}">
        @csrf
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF do Aluno</label>
            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF do Aluno" required>
        </div>
        <button type="submit" class="btn btn-primary">Carregar Disciplinas</button>
    </form>

    <!-- Informações do Aluno -->
    <div id="alunoInfo" class="mt-4" style="display: none;">
        <h3>Informações do Aluno</h3>
        <p><strong>Nome:</strong> <span id="alunoNome"></span></p>
        <p><strong>Número da Turma:</strong> <span id="alunoTurma"></span></p>
        <p><strong>Ano de Ingresso:</strong> <span id="alunoAnoIngresso"></span></p>
        <p><strong>Período de Ingresso:</strong> <span id="alunoPeriodoIngresso"></span></p>
    </div>

    <!-- Disciplinas Não Cursadas -->
    <div id="disciplinasContainer" class="mt-4" style="display: none;">
        <form id="disciplinasForm" action="{{ route('aluno_disciplina.storeByAluno') }}" method="POST">
            @csrf
            <input type="hidden" name="aluno_id" id="aluno_id">
            <h3>Disciplinas Não Cursadas</h3>
            <div id="disciplinasCheckboxes">
            </div>
            <button type="submit" class="btn btn-success mt-3">Salvar Disciplinas Aprovadas</button>
        </form>
    </div>
</div>

<script>
    
    document.getElementById('cpfForm').onsubmit = async function(event) {
        event.preventDefault();
        
        let cpf = document.getElementById('cpf').value;
        
        const response = await fetch(`/aluno_disciplina/showByCPF`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ cpf: cpf })
        });

        if (response.ok) {
            const data = await response.json();

            
            document.getElementById('aluno_id').value = data.aluno.id;
            document.getElementById('alunoNome').textContent = data.aluno.nome;
            document.getElementById('alunoTurma').textContent = data.aluno.numTurma;
            document.getElementById('alunoAnoIngresso').textContent = data.aluno.ano_ingresso;
            document.getElementById('alunoPeriodoIngresso').textContent = data.aluno.periodo_ingresso;
            document.getElementById('alunoInfo').style.display = 'block';

            
            const disciplinasContainer = document.getElementById('disciplinasContainer');
            const disciplinasCheckboxes = document.getElementById('disciplinasCheckboxes');
            disciplinasCheckboxes.innerHTML = '';
            data.disciplinas.forEach(disciplina => {
                let checkbox = `<div class="form-check">
                    <input class="form-check-input" type="checkbox" name="disciplinas[]" value="${disciplina.id}" id="disciplina_${disciplina.id}">
                    <label class="form-check-label" for="disciplina_${disciplina.id}">${disciplina.nome}</label>
                </div>`;
                disciplinasCheckboxes.innerHTML += checkbox;
            });

            disciplinasContainer.style.display = 'block';
        } else {
            alert('Aluno não encontrado ou erro ao carregar disciplinas.');
        }
    };
</script>
@endsection
