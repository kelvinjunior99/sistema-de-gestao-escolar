@extends('includes.default')

@section('title', 'cadastrar propina')

@section('content')

<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Cadastrar propina</h1>
				</div>
				
				<!--//col-auto-->
			</div>

					@if(session('msg'))
			
					<div class="alert alert-success" role="alert">
						<strong><i class="fa fa-check" aria-hidden="true"></i> {{ session('msg') }} </strong>
					</div>

					@elseif(session('erro'))

					<div class="alert alert-warning" role="alert">
						<strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ session('erro')}} </strong>
					  </div>

					@endif

                     <!--Mensagem de erro
					<div class="alert alert-danger" role="alert">
						<strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> erro </strong> Tente novamente
					</div>

            
                Nome igual
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Não foi possivel cadastrar funcionario</strong> á existe produto com este nome
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div> -->

	

			<form method="POST" action="{{ route('create-propina')}}">
				@csrf
                <div class="row g-2" style="margin-top: -19px;"> 
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="nome" value="{{$aluno->nome}}" id="nome" placeholder="name@example.com" readonly>
                        <label for="floatingInput">Nome do aluno</label>
                    </div>
                </div>			

				 <div class="col-md-12" style="margin-top: -10px;">
                    <div class="form-floating mb-3">
                        <div class="col-auto">
							
							<span class="badge bg-secondary p-4 m-2 fs-6">Janeiro
								<input type="checkbox"  name="mes[]" value="Janeiro" class="m-0">
							</span>

							<span class="badge bg-secondary p-4 m-2 fs-6">Fevereiro
								<input type="checkbox" name="mes[]" value="Fevereiro" class="m-0">
							</span>

							<span class="badge bg-secondary p-4 m-2 fs-6">Março
								<input type="checkbox" name="mes[]" value="Março" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Abril
								<input type="checkbox" name="mes[]" value="Abril" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Maio
								<input type="checkbox" name="mes[]" value="Maio" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Junho
								<input type="checkbox"  name="mes[]" value="Junho" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Julho
								<input type="checkbox"  name="mes[]" value="Julho" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Agosto
								<input type="checkbox"  name="mes[]" value="Agosto" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Setembro
								<input type="checkbox"  name="mes[]" value="Setembro" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Outubro
								<input type="checkbox"  name="mes[]" value="Outubro"class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Novembro
								<input type="checkbox"  name="mes[]" value="Novembro" class="m-0">
							</span>
							<span class="badge bg-secondary p-4 m-2 fs-6">Dezembro
								<input type="checkbox"  name="mes[]" value="Dezembro" class="m-0">
							</span>

						</div>
                    </div>
                </div>
				

				<div class="form-floating">
					<button type="submit" name="btn" class="btn btn-info" id="btn_usuario">Cadastrar</button>&nbsp;
					<button type="reset" class="btn btn-danger">Recomeçar</button>
				</div>
            </div>
			</form>
		</div>


		<div class="col-md-12 mt-5">
			<div class="form-floating mb-3">
				<div class="col-md-12">
					
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
		</div>

		<div>
			{{$propinas->links()}}
		</div>
		
				</div>
			</div>
		</div>
	</div>
</div>
    
@endsection

@push('script')
   <!-- <script src=" {{ asset('arq2/js/validacao.js') }}"></script> -->
@endpush

