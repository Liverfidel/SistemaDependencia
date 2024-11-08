<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;


    protected $table = 'disciplinas';

    protected $fillable = [
        'nome',
        'cargaHorario',
        'semestre',
    ];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_disciplina')
        ->using(AlunoDisciplina::class)
        ->withPivot('aluno_id', 'disciplina_id');
    }

}
