<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AlunoDisciplina extends Pivot
{
    use HasFactory;

    protected $table = 'aluno_disciplina';

    protected $fillable = [
        'aluno_id',
        'disciplina_id',
    ];
}
    