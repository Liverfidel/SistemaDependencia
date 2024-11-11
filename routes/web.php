<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\AlunoDisciplinaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rota principal
Route::get('/', function () {
    return view('index'); 
})->name('index'); 

Route::get('alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::get('criarAlunos/', [AlunoController::class, 'create'])->name('alunos.create');
Route::post('criarAlunos/cadastrar', [AlunoController::class, 'store'])->name('alunos.store');
Route::get('ListarAlunos/{aluno}/editar', [AlunoController::class, 'edit'])->name('alunos.edit');
Route::put('ListarAlunos/atualizar/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
Route::delete('ListarAlunos/remover/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');

Route::get('disciplinas', [DisciplinaController::class, 'index'])->name('disciplinas.index');
Route::get('criarDisciplinas/', [DisciplinaController::class, 'create'])->name('disciplinas.create');
Route::post('criarDisciplinas/cadastrar', [DisciplinaController::class, 'store'])->name('disciplinas.store');
Route::get('disciplinas/editar/{disciplina}', [DisciplinaController::class, 'edit'])->name('disciplinas.edit');
Route::put('disciplinas/atualizar/{disciplina}', [DisciplinaController::class, 'update'])->name('disciplinas.update');
Route::delete('disciplinas/remover/{disciplina}', [DisciplinaController::class, 'destroy'])->name('disciplinas.destroy');

Route::get('/aluno-disciplina/turma', [AlunoDisciplinaController::class, 'createByTurma'])->name('aluno_disciplina.createByTurma');
Route::post('/aluno-disciplina/turma', [AlunoDisciplinaController::class, 'storeByTurma'])->name('aluno_disciplina.storeByTurma');

Route::get('/aluno_disciplina/createByAluno', [AlunoDisciplinaController::class, 'createByAluno'])->name('aluno_disciplina.createByAluno'); 
Route::post('/aluno_disciplina/showByCPF', [AlunoDisciplinaController::class, 'showByCPF'])->name('aluno_disciplina.showByCPF');
Route::post('/aluno_disciplina/storeByAluno', [AlunoDisciplinaController::class, 'storeByAluno'])->name('aluno_disciplina.storeByAluno');


Route::get('/relatorio/aluno', [AlunoDisciplinaController::class, 'relatorioPorAluno'])->name('relatorio.aluno');
Route::get('/relatorio/disciplinas', [AlunoDisciplinaController::class, 'relatorioPorDisciplina'])->name('relatorio.disciplina');
Route::get('/relatorio/disciplina/gerar', [AlunoDisciplinaController::class, 'relatorioPorDisciplina'])->name('relatorio.disciplina');
Route::get('/relatorio/turma', [AlunoDisciplinaController::class, 'relatorioPorTurma'])->name('relatorio.turma');
