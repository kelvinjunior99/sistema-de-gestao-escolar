@extends('includes.default')

@section('title', 'editar professor')

@section('content')

<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Editar professor</h1>
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

	

			<form method="POST" action="{{ route('update-prof', $professor->slug)}}" enctype="multipart/form-data">
				@csrf
				@method('put')
				
                <div class="row g-2"> 
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="nome" value="{{$professor->nome}}" id="nome" placeholder="name@example.com">
                        <label for="floatingInput">Nome Completo</label>
    
                        @error('nome')
                        <div class="m-1"><h6 class="text-warning">O nome é obrigátorio </h6> </div>                           
                        @enderror
                    </div>
                </div>

				
				
				<div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="morada" value="{{$professor->morada}}" id="morada" placeholder="name@example.com">
                        <label for="floatingInput">Morada</label>
    
                        @error('nome')
                        <div class="m-1"><h6 class="text-warning">O nome é obrigátorio </h6> </div>                           
                        @enderror
                    </div>
                </div>

				<div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="telefone" value="{{$professor->telefone}}" id="nome" placeholder="name@example.com">
                        <label for="floatingInput">Telefone</label>
    
                        @error('nome')
                        <div class="m-1"><h6 class="text-warning">O nome é obrigátorio </h6> </div>                           
                        @enderror
                    </div>
                </div>

				
				<div class="col-md-4 d-none">
                    <div class="input-group">
  						<input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                </div>


				<div class="form-floating">
					<button type="submit" name="btn" class="btn btn-success" id="btn_usuario">Salvar</button>&nbsp;
					<button type="reset" class="btn btn-danger">Recomeçar</button>
				</div>
            </div>
			</form>

		</div>
	</div>
</div>
    
@endsection

@push('script')
   <!-- <script src=" {{ asset('arq2/js/validacao.js') }}"></script> -->
@endpush

