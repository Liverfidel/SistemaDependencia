<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class AlunoDisciplinaController extends Controller
{
    
    public function createByTurma()
    {
        $disciplinas = Disciplina::all();
        $turmas = Aluno::select('numTurma')->distinct()->get();
        return view('aluno_disciplina.create_by_turma', compact('turmas', 'disciplinas'));
    }

    
    public function storeByTurma(Request $request)
    {
        $request->validate([
            'numTurma' => 'required|integer',
            'disciplina_id' => 'required|exists:disciplinas,id',
        ]);

        $alunos = Aluno::where('numTurma', $request->numTurma)->get();

        foreach ($alunos as $aluno) {
            $aluno->disciplinas()->syncWithoutDetaching([$request->disciplina_id]);
        }

        return redirect()->route('aluno_disciplina.createByTurma')->with('success', 'Disciplinas aprovadas registradas para a turma selecionada.');
    }


        public function relatorioPorAluno(Request $request)
    {
        $cpf = $request->input('cpf'); 
        $aluno = Aluno::where('cpf', $cpf)->first();

        if (!$aluno) {
            return redirect()->back()->with('error', 'Aluno não encontrado.');
        }

        $todasDisciplinas = Disciplina::all();
        $disciplinasAprovadas = $aluno->disciplinas;

        $idsAprovadas = $disciplinasAprovadas->pluck('id')->toArray();
        $disciplinasFaltando = $todasDisciplinas->whereNotIn('id', $idsAprovadas);

        return view('relatorios.aluno', compact('aluno', 'disciplinasAprovadas', 'disciplinasFaltando'));
    }


    public function relatorioPorDisciplina(Request $request)
    {
        $disciplinaNome = $request->input('disciplinaNome'); 
        $disciplina = Disciplina::where('nome', $disciplinaNome)->firstOrFail(); 
    
        
        $alunosComDisciplina = $disciplina->alunos()->pluck('alunos.id')->toArray();
        
        $alunosEmDependencia = Aluno::whereNotIn('id', $alunosComDisciplina)->get();
    
        return view('relatorios.disciplina', compact('disciplina', 'alunosEmDependencia'));
    }
    

    public function relatorioPorTurma(Request $request)
    {
        $numTurma = $request->input('numTurma'); 

        $alunos = Aluno::where('numTurma', $numTurma)->get();
        $semestresAnteriores = Disciplina::all();

        $alunosComDisciplinasNaoCursadas = [];
        foreach ($alunos as $aluno) {
            $disciplinasCursadas = $aluno->disciplinas()->pluck('disciplinas.id');
            $disciplinasNaoCursadas = $semestresAnteriores->whereNotIn('id', $disciplinasCursadas);

            $alunosComDisciplinasNaoCursadas[$aluno->id] = [
                'aluno' => $aluno,
                'disciplinasNaoCursadas' => $disciplinasNaoCursadas
            ];
        }

        return view('relatorios.turma', compact('numTurma', 'alunosComDisciplinasNaoCursadas'));
    }

}
