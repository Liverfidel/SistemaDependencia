<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center my-5">
        <h1>Bem-vindo ao Sistema de Gestão</h1>
        <p>Escolha uma das opções abaixo:</p>

        <!-- Botões de Gerenciamento -->
        <a href="{{ route('alunos.index') }}" class="btn btn-primary mb-3">Gerenciar Alunos</a>
        <a href="{{ route('disciplinas.index') }}" class="btn btn-primary mb-3">Gerenciar Disciplinas</a>
        <a href="{{ route('aluno_disciplina.createByTurma') }}" class="btn btn-secondary mb-3">Cadastrar Disciplinas Aprovadas por Turma</a>

        <!-- Botões de Relatórios -->
        <h3>Relatórios</h3>

       <!-- Formulário para Relatório por Aluno (usando CPF) -->
        <form action="{{ route('relatorio.aluno') }}" method="GET" class="mb-3">
            <label for="cpf">Relatório por Aluno:</label>
            <input type="text" id="cpf" name="cpf" placeholder="Digite CPF do Aluno" required>
            <button type="submit" class="btn btn-secondary">Gerar Relatório</button>
        </form>


        <!-- Relatório por Disciplina -->
        <form action="{{ route('relatorio.disciplina') }}" method="GET" class="mb-3">
            <label for="disciplinaNome">Nome da Disciplina:</label>
            <input type="text" id="disciplinaNome" name="disciplinaNome" placeholder="Digite nome da Disciplina" required>
            <button type="submit" class="btn btn-secondary">Gerar Relatório</button>
        </form>


        <!-- Relatório por Turma -->
        <form action="{{ route('relatorio.turma') }}" method="GET" class="mb-3">
            <label for="numTurma">Relatório por Turma:</label>
            <input type="number" id="numTurma" name="numTurma" placeholder="Número da Turma" required>
            <button type="submit" class="btn btn-secondary">Gerar Relatório</button>
        </form>

        
    <footer class="bg-light text-center py-3 mt-4">
        <p>Desenvolvido por Liver - Sistema de Gestão &copy; {{ date('Y') }}</p>
    </footer>




    </div>
</body>
</html>
