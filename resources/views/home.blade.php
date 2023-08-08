@extends('includes.default')

@section('content')
    
<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
          <!--  <h1 class="app-page-title"></h1> -->
               
            <div class="row g-4 mb-4" style="color:aliceblue;">
                <div class="col-6 col-lg-3">
                    <div class="app-card  shadow-sm h-100 bg-primary">
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Alunos</h4>
                            <div class="stats-figure fs-5">{{$aluno}}</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('lista-aluno')}}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card  shadow-sm h-100 bg-danger">
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Professores</h4>
                            <div class="stats-figure fs-5">{{$professor}}</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('lista-prof')}}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card  shadow-sm h-100 bg-primary" style="">
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Turmas</h4>
                            <div class="stats-figure fs-5">{{$turma}}</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('lista-turma')}}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card  shadow-sm h-100 bg-warning text-dark" style="">
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Cursos</h4>
                            <div class="stats-figure fs-5">{{$curso}}</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('lista-curso')}}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card  shadow-sm h-100 bg-info">
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Propinas</h4>
                            <div class="stats-figure fs-5">{{$propina}}</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('lista-propina')}}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3 d-none">
                    <div class="app-card  shadow-sm h-100 bg-warning" style="">
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-bus fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Transporte</h4>
                            <div class="stats-figure fs-5">22</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href=""></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card  shadow-sm h-100 bg-warning" >
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Uniforme</h4>
                            <div class="stats-figure fs-5">{{$uniforme}}</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('lista-uniforme')}}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3 d-none">
                    <div class="app-card  shadow-sm h-100 bg-danger">
                        <div class="app-card-body p-3 p-lg-4">
                            <div>
                                <i class="fa fa-folder fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="app-card-stat">
                            <h4 class="stats-type mb-2 fs-5">Certificados</h4>
                            <div class="stats-figure fs-5">22</div>
                        </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href=""></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
               

                
                
            </div><!--//row-->
            
            <div class="row g-4 mb-4 d-none">
                
                <div class="col-12 col-lg-4">
                    
                </div><!--//col-->

                <div class="col-md-12">

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>

                </div>
                
                
            </div><!--//row-->
            
        </div><!--//container-fluid-->
    </div><!--//app-content-->
    
    
    
</div><!--//app-wrapper-->    					


@endsection