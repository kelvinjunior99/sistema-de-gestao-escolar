@extends('includes.default')

@section('title', 'editar propina')

@section('content')

<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Editar pagamento de uniforme</h1>
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

	

			<form method="POST" action="{{ route('update-uniforme', $aluno->id)}}">
				@csrf
                @method('put')
                <div class="row g-2" style="margin-top: -19px;"> 
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="nome" value="{{$aluno->nome}}" id="nome" placeholder="name@example.com" readonly>
                        <label for="floatingInput">Nome do aluno</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" value="{{$aluno->quantidade}}" name="quantidade"  id="nome" placeholder="name@example.com" min="1">
                        <label for="floatingInput">Quantidade</label>
                    </div>
                </div>			

				 <div class="col-md-12" style="margin-top: -10px;">
                    <div class="form-floating mb-3">
                        <div class="col-auto">
							
						

						</div>
                    </div>
                </div>
				

				<div class="form-floating">
					<button type="submit" name="btn" class="btn btn-info" id="btn_usuario">Salvar</button>&nbsp;
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
					
					</div>
					</div>
				</div>
			</div> 
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

