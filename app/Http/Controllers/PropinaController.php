<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Propina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropinaController extends Controller
{
    public function lista() {


        $search = request('search');

        if($search) 
        {
            $propinas = Propina::where([
                ['nome', 'like', '%'.$search.'%']
            ])->paginate(4);

        } else {
            $propinas = Propina::orderBy('nome')->paginate(4);
        }

        return view('lista.propinas', compact('propinas', 'search'));
    }

    public function cadastrar(Aluno $aluno, Request $request) {

        $cursos = Curso::all();
        $turmas = Turma::all();
        $nome = $aluno->nome;
 
        //$aluno = Propina::find($aluno);
        // $propinas = DB::table('propinas')->where('nome', $nome)->first();
        $propinas = Propina::orderBy('nome')->where('nome', $nome)->paginate(4);
            
            //$meses = $propinas->mes ?? '';
            //$arrayData = json_decode($meses, true);
            return view('pagamento.propina', compact('aluno', 'propinas'));
            
        //$propinas = Propina::all();
    

        
    }

    public function create(Request $request) {
        
        $propina = new Propina;

        $propina->nome = $request->nome;
        $propina->mes = $request->mes;

        if(!$request->mes) {

            return back()->with('erro', 'Deves selecionar pelo menos um mês');
        } 
        else {

            $propina->save();

            return back()->with('msg', 'Cadastrado com sucesso');
        }
    }

    public function delete(Propina $id) {

            $id->delete();
            
            return back();
    }

    public function editar(Propina $propina) {

        $id = $propina->id;
 
        //$aluno = Propina::find($aluno);
        $propinas = DB::table('propinas')->where('id', $id)->first();
            
            $meses = $propinas->mes ?? '';
            $arrayData = json_decode($meses, true);

        return view('editar.propina', compact('propina', 'arrayData'));
    }

    public function update(Propina $propina, Request $request) {

            $dados = $request->all();

            $propina->fill($dados);
            $propina->save();

            return back()->with('msg', 'salvo');
    }
}
