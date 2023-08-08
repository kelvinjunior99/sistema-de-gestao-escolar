<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Uniforme;

class UniformeController extends Controller
{
    public function lista() {

        $search = request('search');

        if($search) 
        {
            $uniformes = Uniforme::where([
                ['nome', 'like', '%'.$search.'%']
            ])->paginate(5);

        } else {
            $uniformes = Uniforme::orderBy('nome')->paginate(5);
        }

        return view('lista.uniformes', compact('uniformes', 'search'));
    }
    
    public function cadastrar(Aluno $aluno) {

        return view('pagamento.uniforme', compact('aluno'));
    }

    public function create(Request $request) {

        $dados = $request->all();

        Uniforme::create($dados);

        return back()->with('msg', 'Cadastrado com sucesso');
       
    }

    public function delete(Uniforme $id) {

        $id->delete();

        return back();
    }

    public function editar(Uniforme $aluno) {

        return view('editar.uniforme', compact('aluno'));
    }

    public function update(Uniforme $aluno, Request $request) {

        $dados = $request->all();
        $aluno->fill($dados);
        $aluno->save();

        return redirect()->route('lista-uniforme');
    }
}
