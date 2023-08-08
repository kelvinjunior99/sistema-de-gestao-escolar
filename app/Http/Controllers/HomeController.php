<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Uniforme;
use App\Models\Curso;
use App\Models\Propina;
use App\Models\Turma;
use App\Models\Testando;

class HomeController extends Controller
{
    public function home() 
    {
        $aluno = Aluno::count();
        $uniforme = Uniforme::count();
        $turma = Turma::count();
        $curso = Curso::count();
        $propina = Propina::count();
        $professor = Testando::count();

        return view('home', compact('aluno', 'uniforme', 'turma', 'curso', 'propina', 'professor'));
    }

    public function sobre() {

        return view('sobre');
    }
}
