<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestandoController;
use App\Http\Controllers\PropinaController;
use App\Http\Controllers\TurmaController;  
use App\Http\Controllers\UniformeController;  
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('cadastrar')->group(function() {
    Route::get('/aluno', [AlunoController::class, 'cadastrar'])->name('cad-aluno');
    Route::post('/aluno/create', [AlunoController::class, 'create'])->name('create-aluno');
    Route::delete('/aluno/delete/{id}', [AlunoController::class, 'delete'])->name('delete-aluno');

    Route::get('/professor', [TestandoController::class, 'cadastrar'])->name('cad-prof');
    Route::post('/professor/create', [TestandoController::class, 'create'])->name('create-prof');
    Route::delete('/professor/delete{id}', [TestandoController::class, 'delete'])->name('delete-prof');
    
    Route::get('/curso', [CursoController::class, 'cadastrar'])->name('cad-curso');
    Route::post('/curso/create', [CursoController::class, 'create'])->name('create-curso');
    Route::delete('/curso/delete/{id}', [CursoController::class, 'delete'])->name('delete-curso');
    
    
    Route::get('/turma', [TurmaController::class, 'cadastrar'])->name('cad-turma');
    Route::post('/turma/create', [TurmaController::class, 'create'])->name('create-turma');
    Route::delete('/turma/delete/{id}', [TurmaController::class, 'delete'])->name('delete-turma');

    Route::get('/propina', [PropinaController::class, 'cadastrar'])->name('cad-propina');
});

Route::prefix('lista')->group(function() {
    Route::get('/alunos', [AlunoController::class, 'lista'])->name('lista-aluno');

    Route::get('/alunos/desistentes', [AlunoController::class, 'desistentes'])->name('desistentes');
    Route::get('/alunos/activos', [AlunoController::class, 'activos'])->name('activos');

    Route::get('/professores', [TestandoController::class, 'lista'])->name('lista-prof');
    Route::get('/cursos', [CursoController::class, 'lista'])->name('lista-curso');
    Route::get('/turmas', [TurmaController::class, 'lista'])->name('lista-turma');
    Route::get('/propinas', [PropinaController::class, 'lista'])->name('lista-propina');
    Route::get('/uniformes', [UniformeController::class, 'lista'])->name('lista-uniforme');
});

Route::prefix('editar')->group(function() {
    Route::get('/aluno/{aluno:slug}', [AlunoController::class, 'editar'])->name('editar-aluno');
    Route::put('/aluno/{aluno:slug}', [AlunoController::class, 'update'])->name('update-aluno');

    Route::get('/professor/{professor:slug}', [TestandoController::class, 'editar'])->name('editar-prof');
    Route::put('/professor/{professor:slug}', [TestandoController::class, 'update'])->name('update-prof');

    Route::get('/imagem/aluno/{aluno:slug}', [AlunoController::class, 'editarFoto'])->name('editar-foto');

    Route::get('/curso/{curso:slug}', [CursoController::class, 'editar'])->name('editar-curso');
    Route::put('/curso/{curso:slug}', [CursoController::class, 'update'])->name('update-curso');

    Route::get('/turma/{turma:slug}', [TurmaController::class, 'editar'])->name('editar-turma');
    Route::put('/turma/{turma:slug}', [TurmaController::class, 'update'])->name('update-turma');

    Route::get('/uniforme/{aluno}', [UniformeController::class, 'editar'])->name('editar-uniforme');
    Route::put('/uniforme/{id}', [UniformeController::class, 'update'])->name('update-uniforme');

});

Route::prefix('perfil')->group( function() {
    Route::get('/aluno/{aluno:slug}', [AlunoController::class, 'perfil'])->name('perfil-aluno');

    Route::get('/aluno/imagem/{aluno}', [AlunoController::class, 'deletarImagem'])->name('delete-imagem');
    Route::put('/aluno/{aluno}/editar', [AlunoController::class, 'editarImagem'])->name('editar-imagem');
    
    Route::get('/aluno/{id}/desistir', [AlunoController::class, 'estadoDois'])->name('estado-dois');
    Route::get('/aluno/{id}/activo', [AlunoController::class, 'estadoUm'])->name('estado-um');
});

Route::prefix('pagamento')->group( function() {
    Route::get('/propina/{aluno:slug}', [PropinaController::class, 'cadastrar'])->name('propina');
    Route::post('/propina', [PropinaController::class, 'create'])->name('create-propina');
    Route::delete('/propinas/{id}', [PropinaController::class, 'delete'])->name('delete-propina');

    Route::get('/propinas/{propina}', [PropinaController::class, 'editar'])->name('editar-propina');
    Route::put('/propinas/{propina}/update', [PropinaController::class, 'update'])->name('update-propina');

    Route::get('/uniforme/{aluno:slug}', [UniformeController::class, 'cadastrar'])->name('uniforme');
    Route::post('/uniforme', [UniformeController::class, 'create'])->name('create-uniforme');
    Route::delete('/uniforme/{id}', [UniformeController::class, 'delete'])->name('delete-uniforme');
    
});

Route::get('/',[HomeController::class, 'home'])->name('home');
Route::get('/sobre-sistema',[HomeController::class, 'sobre'])->name('sobre');

/*Route::get('/', function () {
    return view('welcome');
}); */
