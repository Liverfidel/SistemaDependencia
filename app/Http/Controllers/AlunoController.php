<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|string',
            'numTurma' => 'required|integer',
            'ano_ingresso' => 'required|integer',
            'periodo_ingresso' => 'required|string',
        ]);

        Aluno::create($request->all());
        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso.');
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|string',
            'numTurma' => 'required|integer',
            'ano_ingresso' => 'required|integer',
            'periodo_ingresso' => 'required|string',
        ]);

        $aluno->update($request->all());
        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno deletado com sucesso.');
    }
}
