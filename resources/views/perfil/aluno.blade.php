@extends('includes.default')

@section('title', 'Perfil')
@section('content')


<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
           <!-- <h1 class="app-page-title">My Account</h1>-->
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder d-none">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
    </svg>  
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">{{$aluno->nome}}</h4>
                                    <p class="fs-6">Matricula: {{ $aluno->id}}</p>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label mb-2"><strong>Photo</strong></div>
                                        @if ($aluno->imagem == null)
                                        <div class="item-data"><img width="200" class="profile-image" src="{{ asset('imagem/avatar.png')}}" alt="{{$aluno->nome}}"></div>
                                        @else 
                                        <div class="item-data"><img width="200" class="profile-image" src="{{ url("storage/{$aluno->imagem}")}}" alt="{{$aluno->nome}}"></div>
                                        @endif
                                        
                                    </div>
                                    @if (!$aluno->imagem == null)
                                        <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="{{ route('delete-imagem', $aluno->id)}}">eliminar imagem</a>
                                    </div>
                                    @endif
                                    
                                    
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Pai</strong></div>
                                        <div class="item-data">{{$aluno->pai}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Mãe</strong></div>
                                        <div class="item-data">{{$aluno->mae}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Morada</strong></div>
                                        <div class="item-data">{{$aluno->morada}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Telefone</strong></div>
                                        <div class="item-data">
                                            {{$aluno->telefone}}
                                        </div>
                                    </div><!--//col-->
                                    
                                </div><!--//row-->
                            </div><!--//item-->
                            
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                           <a class="btn btn-secondary" href="{{ route('editar-aluno', $aluno->slug)}}">Editar</a>

                           <a class="btn btn-danger" href="#modal?id={{$aluno->id}}" data-bs-toggle="modal" data-bs-target="#modal{{$aluno->id}}">Excluir</a>
                        </div>

                        <!-- Modal -->
						<div class="modal fade" id="modal{{$aluno->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Desejas excluir <strong class="text-success"> {{$aluno->nome}}</strong> ?</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									
									<div class="modal-footer">
									<form action="{{ route('delete-aluno', $aluno->id)}}" method="post">
										@method('delete')
										@csrf
													
										<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>

										<button type="submit" class="btn btn-danger">Excluir</button>

									</form>
										
										
									</div>
								</div>
							</div>
						</div>
                       
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Curso </strong></div>
                                        <div class="item-data">{{$aluno->curso}} </div>
                                    </div><!--//col-->
                                    
                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Classe </strong></div>
                                        <div class="item-data">{{$aluno->classe}} </div>
                                    </div><!--//col-->
                                    
                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Periodo</strong></div>
                                        <div class="item-data">{{$aluno->periodo}}</div>
                                    </div><!--//col-->
                                    
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Sala</strong></div>
                                        <div class="item-data">{{$aluno->sala}}</div>
                                    </div><!--//col-->
                                    
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Turma</strong></div>
                                        <div class="item-data">{{$aluno->turma}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Estado</strong></div>
                                        <div class="item-data">
                                            @if ($aluno->estado == 'activo')
                                                <span class="badge bg-success">{{$aluno->estado}}</span>
                                                @else 
                                                <span class="badge bg-danger">{{$aluno->estado}}</span>
                                            @endif
                                             
                                        </div>
                                    </div><!--//col-->

                                    <div class="col-auto">
                                        <div class="item-label"><strong>Editar</strong></div>

                                        <div class="btn-group">

                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Estado
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item bg-success text-white" href="{{ route('estado-um', $aluno->id)}}">Activo
                                                
                                                    @if($aluno->estado == 'activo')
                                                    <i class="fa fa-check float-end" aria-hidden="true">
                                                    </i>
                                                    @endif

                                                </a></li>
                                                <li>
                                                    <a class="dropdown-item bg-danger text-white" href="{{ route('estado-dois', $aluno->id)}}">Desistente 

                                                        @if($aluno->estado == 'desistente')
                                                        <i class="fa fa-check float-end" aria-hidden="true">
                                                        </i>
                                                        @endif

                                                    </a> 
                                                    </li>
                                            </ul>

                                          </div>
                                    </div><!--//col-->

                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Data de cadastramento</strong></div>
                                        <div class="item-data">{{ date('d/m/Y', strtotime($aluno->created_at)) }} {{ date('H:i', strtotime($aluno->created_at)) }} </div>
                                    </div><!--//col-->
                                    
                                </div><!--//row-->
                            </div><!--//item-->
                        </div><!--//app-card-body-->
                       
                       
                    </div><!--//app-card-->
                </div><!--//col-->
               
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
</svg>
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Propinas</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        
                        <div class="app-card-body px-4 w-100">
                            
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-12">

                                        @if (count($propinas) == 0)
                                            
                                        <div class="alert alert-danger" role="alert">
                                            Nenhum pagamento
                                        </div>
                                        
                                        @else 
                                            
                                        <div class="tab-content" id="orders-table-tab-content">
                                            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                                <div class="app-card app-card-orders-table shadow-sm mb-5">
                                                    <div class="app-card-body">
                                                     <div class="table-responsive" style="background-color: #fff;">     
                                        <table class="table app-table-hover mb-0 text-left table-striped ">
                                            <thead>
                                                <tr>
                                                    <th class="cell"></th>

                                                    <th class="cell">Mês pago</th>
                                                    <th class="cell">Data</th>
                                                </tr>
                                            </thead>
                                    <tbody>
                                    
                                        @foreach ($propinas as $propina)
        
                                        <tr>
                                    
                                            <td class="cell"></td>
                                           
                                           <td class="cell">
                                            @foreach ($propina->mes as $meses)
                                            
                                            <span class="badge bg-primary text-dark"> {{$meses}} </span>
                                             @endforeach
                                           </td>
                                           <td class="cell"><span>{{ date('d/m/Y', strtotime($propina->created_at)) }} </span><span class="note">{{ date('H:i', strtotime($propina->created_at)) }}</span></td>
               
               
                                           <td class="cell"><a href="{{ route('editar-propina', $propina->id)}}"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a></td>
               
                                           <td class="cell"><a href="#modal?id={{$propina->id}}" data-bs-toggle="modal" data-bs-target="#modal{{$propina->id}}" class="text-danger"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></td>
               
                                       <!-- Modal -->
                                       <div class="modal fade" id="modal{{$propina->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h5 class="modal-title" id="exampleModalLabel">Desejas anular este pagamento de propina de <strong class="text-success"> {{$propina->nome}}</strong> ?</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   </div>
                                                   
                                                   <div class="modal-footer">
                                                   <form action="{{ route('delete-propina', $propina->id)}}" method="post">
                                                       @method('delete')
                                                       @csrf
                                                                   
                                                       <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
               
                                                       <button type="submit" class="btn btn-danger">Anular</button>
               
                                                   </form>
                                                       
                                                       
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       
                                                   </tr>
                                            
                                        @endforeach
                                    
                                              
        
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>
                                    </div>
                                </div> 
                                <div>
                                {{$propinas->links()}}
                            </div>
                            </div>
                     @endif

                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            
                            
                        </div><!--//app-card-body-->

                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Voltar no top</a>
                            <a class="btn btn-secondary" href="{{ route('propina', $aluno->slug)}}">Pagar</a>
                         </div><!--//app-card-footer-->

                </div>
            </div>

                <div class="col-12 col-lg-12 d-none">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">  
                    <i class="fa fa-bus" aria-hidden="true"></i>
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Transporte</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                  
						
                                        <div class="alert alert-danger" role="alert">
                                     Nenhum pagamento
                                        </div>
            
                                       

                                    </div><!--//col-->

                                   

                                </div><!--//row-->
                            </div><!--//item-->
                           
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                           <a class="btn app-btn-secondary" href="#">Voltar no top</a> 
                           <a class="btn btn-secondary" href="#">Pagar</a>
                        </div><!--//app-card-footer-->
                        
                       
                    </div><!--//app-card-->
                </div>

                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">  
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Uniforme</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-12">
                                        
                                        

                                         @if (count($uniformes) == 0)
                                             
                                         <div class="alert alert-danger" role="alert">
                                            Nenhum pagamento
                                            </div>

                                            @else 

                                            <div class="tab-content" id="orders-table-tab-content">
                                                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                                                        <div class="app-card-body">
                                                            <div class="table-responsive" style="background-color: #fff;">
                                                                
                                                                <table class="table app-table-hover mb-0 text-left table-striped ">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="cell"></th>
                                                                            <th class="cell">Nome</th>
                                                                            <th class="cell">Quantidade</th>
                                                                            <th class="cell">Data</th>
                                                                        </tr>
                                                                    </thead>
                                                            <tbody>
                                                            
                                                                @foreach ($uniformes as $uniforme)
                                
                                                                <tr>
                                                                   <td class="cell"></td>
                                                                   <td class="cell">{{$uniforme->nome}}</td>
                                                                   <td class="cell">{{$uniforme->quantidade}}</td>
                                                                   <td class="cell"><span>{{ date('d/m/Y', strtotime($uniforme->created_at)) }} </span><span class="note">{{ date('H:i', strtotime($uniforme->created_at)) }}</span></td>
                                       
                                                                   <td class="cell"><a href="{{ route('editar-uniforme', $uniforme->id)}}"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a></td>
                                       
                                                                   <td class="cell"><a href="#modal?id={{$uniforme->id}}" data-bs-toggle="modal" data-bs-target="#modal{{$uniforme->id}}" class="text-danger"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></td>
                                       
                                                               <!-- Modal -->
                                                               <div class="modal fade" id="modal{{$uniforme->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                   <div class="modal-dialog">
                                                                       <div class="modal-content">
                                                                           <div class="modal-header">
                                                                               <h5 class="modal-title" id="exampleModalLabel">Desejas excluir <strong class="text-success"> {{$uniforme->nome}}</strong> ?</h5>
                                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                           </div>
                                                                           
                                                                           <div class="modal-footer">
                                                                           <form action="{{ route('delete-uniforme', $uniforme->id)}}" method="post">
                                                                               @method('delete')
                                                                               @csrf
                                                                                           
                                                                               <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                       
                                                                               <button type="submit" class="btn btn-danger">Excluir</button>
                                       
                                                                           </form>
                                                                               
                                                                               
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               
                                                                           </tr>
                                                                    
                                                                @endforeach
                                                            
                                                                      
                                
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                            
                                                            <!--//table-responsive-->
                                
                                                        </div>
                                                        <!--//app-card-body-->
                                                    </div>
                                                    <!--//app-card-->
                                
                                            </div>
                                            <!--//tab-content-->
                                
                                            <div>
                                                {{$uniformes->links()}}
                                            </div>                 
                                        </div>
                                         
                                        @endif

                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                           
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                           <a class="btn app-btn-secondary" href="#">Voltar no top</a> 
                           <a class="btn btn-secondary" href="{{ route('uniforme', $aluno->slug) }}">Pagar</a>
                        </div><!--//app-card-footer-->
                        
                       
                    </div><!--//app-card-->
                </div>

                <div class="col-12 col-lg-12 d-none">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">  
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                                            </svg>
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Certificado</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                  
						
                                        <div class="alert alert-danger" role="alert">
                                     Nenhum pagamento
                                        </div>
            
                                       

                                    </div><!--//col-->

                                   

                                </div><!--//row-->
                            </div><!--//item-->
                           
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                           <a class="btn app-btn-secondary" href="#">Voltar no top</a> 
                           <a class="btn btn-secondary" href="#">Pagar</a>
                        </div><!--//app-card-footer-->
                        
                       
                    </div><!--//app-card-->
                </div>

            </div><!--//row-->
            
        </div><!--//container-fluid-->
    </div><!--//app-content-->
   
</div><!--//app-wrapper-->    					
@endsection