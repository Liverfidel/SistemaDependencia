<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disciplina;

class DisciplinaSeeder extends Seeder
{
   
    public function run(): void
    {
        Disciplina::create([
            'nome' => 'Matemática',
            'cargaHorario' => 60, 
            'semestre' => 1
        ]);

        Disciplina::create([
            'nome' => 'Português',
            'cargaHorario' => 50,
            'semestre' => 1
        ]);
    }
}
