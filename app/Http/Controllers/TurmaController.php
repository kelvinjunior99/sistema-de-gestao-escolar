<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class TurmaController extends Controller
{
    public function lista() {

        $search = request('search');

        if($search) 
        {
            $turmas = Turma::where([
                ['nome', 'like', '%'.$search.'%']
            ])->paginate(4);

        } else {
             $turmas = Turma::orderBy('nome')->paginate(5);
        }

        return view('lista.turmas', compact('turmas', 'search'));
    }

    public function delete(Turma $id) {

        $id->delete();
        return back();
    }
    public function cadastrar() {

        $cursos = Curso::all();

        return view('cadastrar.turma', compact('cursos'));
    }

    public function create(Request $request) {

        $turma = $request->all();
        $nome = $request->nome;

        $sql = DB::table('turmas')->where('nome', $nome)->first();

        if($sql) {
            return back()->with('erro', 'Este nome já esta cadastrado no sistema. Mudar nome');
        }
        else {
            $turma['slug'] = Str::slug($request->nome);
            Turma::create($turma);
            return back()->with('msg', 'Cadastrado com sucesso'); 
        }

    }

    public function editar(Turma $turma) {

        $cursos = Curso::all();
        
        return view('editar.turma', compact('turma', 'cursos'));
    }

    public function update(Turma $turma, Request $request) {

        $dados = $request->all();
        
            $turma['slug'] = Str::slug($request->nome);

            $turma->fill($dados);
            $turma->save();

            return Redirect::route('lista-turma');
        
    }

}
