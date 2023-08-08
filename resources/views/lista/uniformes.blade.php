@extends('includes.default')

@section('title', 'Lista de cursos')
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
                                <form class="table-search-form row gx-1 align-items-center" method="gest" action="">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="search" required class="form-control search-orders" placeholder="pesquisar">
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


			@if (isset($search))
			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill nav-link active" id="orders-all-tab" data-bs-toggle="tab" role="tab" aria-controls="orders-all" aria-selected="true" style="text-align: left; cursor: normal; text-transform: uppercase;">Resultado</a>
			</nav>

			@else 

			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill nav-link active" id="orders-all-tab" data-bs-toggle="tab" role="tab" aria-controls="orders-all" aria-selected="true" style="text-align: left; cursor: normal; text-transform: uppercase;">Lista de pagamento de uniforme</a>
			</nav>

			@endif
			

			@if (count($uniformes) == 0 && $search)

			<div class="alert alert-danger" role="alert">
                Não foi encontrado   : <b> {{$search}}</b>
              </div>
			
			@elseif(count($uniformes) == 0)

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


		<!--//container-fluid-->
	</div>
	<!--//app-content-->

@endsection