<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Testando;

class TestandoController extends Controller
{

    public function lista() {

        $search = request('search');

        if($search) 
        {
            $professores = Testando::where([
                ['nome', 'like', '%'.$search.'%']
            ])->paginate(4);

        } else {
            $professores = Testando::orderBy('nome')->paginate(4);
        }

        return view('lista.professores', compact('professores', 'search'));
    }

    public function delete(Testando $id) {

        $id->delete();
        return back();
    }
    
    public function cadastrar() {

        return view('cadastrar.professor');
    }


    public function create(Request $request) {

        $dados = $request->all();
        $nome = $request->nome;

        $sql = DB::table('testandos')->where('nome', $nome)->first();

        if($sql) {
            return back()->with('erro', 'Este nome já esta cadastrado no sistema. Mudar nome');
        }
        else {
            $dados['slug'] = Str::slug($request->nome);

            if(!empty($dados['imagem']) && $dados['imagem']->isValid())
            {
            $file =  $dados['imagem'];
            $path = $file->store('imagens/professor');
            $dados['imagem'] = $path;
             }
            Testando::create($dados);

            return back()->with('msg', 'Cadastrado com sucesso'); 
        }

        
    }

    public function editar(Testando $professor) {

        return view('editar.professor', compact('professor'));
    }

    public function update(Testando $professor, Request $request) {

        $dados = $request->all();

        $professor['slug'] = Str::slug($request->nome);

        $professor->fill($dados);
        $professor->save();

       return redirect()->route('lista-prof');

    }
}
