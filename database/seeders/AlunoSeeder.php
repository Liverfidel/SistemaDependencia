<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunoSeeder extends Seeder
{
    public function run(): void
        {
            Aluno::create([
                'nome' => 'João',
                'cpf' => '12345',
                'numTurma' => 1, 
                'ano_ingresso' => 2022,
                'periodo_ingresso' => 'primeiro'
            ]);

            Aluno::create([
                'nome' => 'Maria',
                'cpf' => '987',
                'numTurma' => 2, 
                'ano_ingresso' => 2023,
                'periodo_ingresso' => 'segundo'
            ]);

            Aluno::create([
                'nome' => 'Carlos',
                'cpf' => '543',
                'numTurma' => 3, 
                'ano_ingresso' => 2024,
                'periodo_ingresso' => 'terceiro'
            ]);
        }
}
