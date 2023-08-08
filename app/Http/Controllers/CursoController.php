<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CursoController extends Controller
{

    public function lista() {

        $search = request('search');

        if($search) 
        {
            $cursos = Curso::where([
                ['nome', 'like', '%'.$search.'%']
            ])->paginate(4);

        } else {
            $cursos = Curso::orderBy('nome')->paginate(4);
        }

        return view('lista.cursos', compact('cursos', 'search'));
    }

    public function delete(Curso $id) {

        $id->delete();
        return back();
    }

    public function cadastrar() {

        return view('cadastrar.curso');
    }

    public function create(Request $request) {

        $curso = $request->all();
        $nome = $request->nome;
        $sql = DB::table('cursos')->where('nome', $nome)->first();
        //$sql = Curso::where('nome', $nome)->get();

        if($sql) {
            return back()->with('erro', 'Este curso já esta cadastrado no sistema. Mudar nome');
        }
        else {
            $curso['slug'] = Str::slug($request->nome);
            Curso::create($curso);
            return back()->with('msg', 'Cadastrado com sucesso'); 
        }
        
    }

    public function editar(Curso $curso) {

        return view('editar.curso', compact('curso'));
    }

    public function update(Curso $curso, Request $request) {

           $dados = $request->all();
        
            $curso['slug'] = Str::slug($request->nome);

            $curso->fill($dados);
            $curso->save();

            return Redirect::route('lista-curso');
        
    }
}
