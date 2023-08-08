@extends('includes.default')

@section('title', 'Lista de turmas')
@section('content')


<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0"></h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center" method="get" action="">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="search" class="form-control search-orders" placeholder="procurar turma...">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </form>
                            </div>
							
						</div>
						<!--//row-->
					</div>
					<!--//table-utilities-->
				</div>
				<!--//col-auto-->
			</div>
			<!--//row-->

			@if ($search)
				
			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill nav-link active" id="orders-all-tab" data-bs-toggle="tab" role="tab" aria-controls="orders-all" aria-selected="true" style="text-align: left; cursor: normal; text-transform: uppercase;">Resultado</a>
			</nav>

			@else 

			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill nav-link active" id="orders-all-tab" data-bs-toggle="tab" role="tab" aria-controls="orders-all" aria-selected="true" style="text-align: left; cursor: normal; text-transform: uppercase;">Lista de turma</a>
			</nav>
			@endif
			

			@if (count($turmas) == 0 && $search)

				<div class="alert alert-danger" role="alert">
                Não foi encontrado  curso : <b> {{$search}}</b>
              </div>
			
			  @elseif(count($turmas) == 0)

				<div class="alert alert-danger" role="alert">
                Lista de vazia  
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
											<th class="cell">Turma</th>
                                            <th class="cell">Classe</th>
                                            <th class="cell">Curso</th>
                                            <th class="cell">Data</th>
										</tr>
									</thead>
							<tbody>
							@foreach ($turmas as $turma)
								
							
							<tr>
                            <td class="cell"></td>
							<td class="cell">{{$turma->nome}}</td>
                            <td class="cell">{{$turma->classe}} </td>
                            <td class="cell">{{$turma->curso}}</td>
							<td class="cell"><span>2/2/2022 </span><span class="note">12:21</span></td>

							<td class="cell"><a href="{{ route('editar-turma', $turma->slug)}}"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a></td>

							<td class="cell"><a href="#modal?id={{$turma->id}}" data-bs-toggle="modal" data-bs-target="#modal{{$turma->id}}" class="text-danger"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></td>

						<!-- Modal -->
						<div class="modal fade" id="modal{{$turma->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Desejas excluir <strong class="text-success"> {{$turma->nome}}</strong> ?</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									
									<div class="modal-footer">
									<form action="{{ route('delete-turma', $turma->id)}}" method="post">
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
				{{$turmas->links()}}
				</div>
				@endif
				

		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-content-->

@endsection