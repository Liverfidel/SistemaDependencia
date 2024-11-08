<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'cpf',
        'numTurma',
        'ano_ingresso',
        'periodo_ingresso',
        
    ];

    public function disciplinas()
{
    return $this->belongsToMany(Disciplina::class, 'aluno_disciplina')
    ->using(AlunoDisciplina::class)
    ->withPivot('aluno_id', 'disciplina_id');
}

    

}
