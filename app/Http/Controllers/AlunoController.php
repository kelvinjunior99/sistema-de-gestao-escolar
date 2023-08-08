<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Uniforme;
use App\Models\Propina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AlunoController extends Controller
{
    public function lista() {

        $search = request('search');

        if($search) 
        {
            $alunos = Aluno::where([
                ['nome', 'like', '%'.$search.'%']
            ])->paginate(4);

        } else {
            $alunos = Aluno::orderBy('nome')->paginate(4);
        }

        return view('lista.alunos', compact('alunos', 'search'));
    }

    public function editar(Aluno $aluno) {

        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('editar.aluno', compact('aluno', 'cursos', 'turmas'));
    }

    public function update(Aluno $aluno, Request $request) {

        $dados = $request->all();
        $nome = $request->nome;

        $aluno['slug'] = Str::slug($request->nome);

        if(!empty($dados['imagem']) && $dados['imagem']->isValid())
        {
            $file =  $dados['imagem'];
            $path = $file->store('imagens/alunos');
            $dados['imagem'] = $path;
        }

        $aluno->fill($dados);
        $aluno->save();

        return Redirect::route('lista-aluno');
    }

    public function delete(Aluno $id) {

        $id->delete();
        Storage::delete($id->imagem  ?? '');
        return back();
    }

    public function perfil(Aluno $aluno) {

        $nome = $aluno->nome;
 
        //$aluno = Propina::find($aluno);
        //$propinas = DB::table('propinas')->where('nome', $nome)->get();

        $propinas = Propina::orderBy('nome')->where('nome', $nome)->paginate(4);
        $uniformes = Uniforme::orderBy('nome')->where('nome', $nome)->paginate(4);

        //$meses = $propinas;
        //$arrayData = json_decode($propinas, true);

        return view('perfil.aluno', compact('aluno', 'propinas', 'uniformes'));
    }
    
    public function cadastrar() {

        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('cadastrar.aluno', compact('cursos', 'turmas'));
    }

    public function create(Request $request) {

        $aluno = $request->all();
        $nome = $request->nome;

        $sql = DB::table('alunos')->where('nome', $nome)->first();

        if($sql) {
            return back()->with('erro', 'Este nome já esta cadastrado no sistema. Mudar nome');
        }
        else {
           
            if(!empty($aluno['imagem']) && $aluno['imagem']->isValid())
            {
            $file =  $aluno['imagem'];
            $path = $file->store('imagens/alunos');
            $aluno['imagem'] = $path;
             }
            
            $aluno['slug'] = Str::slug($request->nome);
            Aluno::create($aluno);
            
            return back()->with('msg', 'Cadastrado com sucesso'); 
        }
    }

    public function estadoDois($id) {

        Aluno::find($id)->update([
            'estado' => 'desistente',
         ]);

         return back();

    }

    public function estadoUm($id) {

        Aluno::find($id)->update([
            'estado' => 'activo',
         ]);

         return back();

    }

    public function desistentes() {

        $alunos = DB::table('alunos')->where('estado', 'desistente')->paginate(4);

        return  view('lista.desistentes', compact('alunos'));

    }

    public function activos() {

        $alunos = DB::table('alunos')->where('estado', 'activo')->paginate(4);

        return  view('lista.activos', compact('alunos'));

    }

    public function editarFoto(Aluno $aluno) {

        return view('editar.foto', compact('aluno'));
    }

    public function deletarImagem(Aluno $aluno) {

        Storage::delete($aluno->imagem  ?? '');
        $aluno->imagem = null;
        $aluno->save();

        return back();
    }

    public function editarImagem(Aluno $aluno, Request $request) {
        
        if(!empty($aluno['imagem']) && $aluno['imagem']->isValid())
        {
        $file =  $aluno['imagem'];
        $path = $file->store('imagens/alunos');
        $aluno['imagem'] = $path;
        }

        $aluno->save();

        return back();

    } 

    
}
