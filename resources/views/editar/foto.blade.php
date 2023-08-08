@extends('includes.default')

@section('title', 'Editar imagem')
@section('content')


<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
           <!-- <h1 class="app-page-title">My Account</h1>-->
            <div class="d-flex justify-content-center row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
    </svg>  
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">{{$aluno->nome}}</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100 d-flex justify-content-center">
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">

                                        <div class="card  " style="width: 20rem;">
                                            @if ($aluno->imagem == null)
                                            <img src="{{ asset('imagem/avatar.png')}}" class="card-img-top" alt="...">
                                              @else 
                                            <img width="200" class="card-img-top" src="{{ url("storage/{$aluno->imagem}") }}">
                                            @endif

                                            <div class="card-body">
                                                <form action="{{ route('editar-imagem', $aluno->id)}}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <input type="hidden" name="nome" value="{{ $aluno->nome}}">
                                                    <input type="hidden" name="classe" value="{{ $aluno->classe}}">
                                                    <input type="hidden" name="pai" value="{{ $aluno->pai}}">

                                              <input type="file" name="imagem" id="">
                                            </div>
                                          </div>

                                        
                                    </div><!--//col-->
                                   
                                </div><!--//row-->
                            </div><!--//item-->
                            
                        </div><!--//app-card-body-->
                        
                        <div class="app-card-footer p-4 mt-auto">

                            <button class="btn btn-success" type="submit">Salvar</button>
                           
                        </form>

                           <a class="btn btn-danger" href="{{ route('delete-imagem', $aluno->id)}}">Eliminar imagem</a>

                        </div>

                       
                    </div><!--//app-card-->
                </div><!--//col-->
               
               
                
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                               
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        
                    
                </div>
            </div>

             


               

            </div><!--//row-->
            
        </div><!--//container-fluid-->
    </div><!--//app-content-->
   
</div><!--//app-wrapper-->    					
@endsection