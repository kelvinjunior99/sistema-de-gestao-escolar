<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfController extends Controller
{
    public function lista() {

        return view('lista.professores');
    }
    
    public function cadastrar() {

        return view('cadastrar.professor');
    }

    public function create(Request $request) {

        $prof = $request->all();
        $nome = $request->nome;

        $sql = DB::table('profes')->where('nome', $nome)->first();

        if($sql) {
            return back()->with('erro', 'Este nome já esta cadastrado no sistema. Mudar nome');
        }
        else {
            $prof['slug'] = Str::slug($request->nome);

            if(!empty($prof['imagem']) && $prof['imagem']->isValid())
            {
            $file =  $prof['imagem'];
            $path = $file->store('imagens/professor');
            $prof['imagem'] = $path;
             }
            Prof::create($prof);
            return back()->with('msg', 'Cadastrado com sucesso'); 
        }

        
    }
}
