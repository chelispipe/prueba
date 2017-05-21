@extends('plantilla')

@section('title')
	Detalles Elemento -
@stop

@section('css_page')
  
      <link rel="stylesheet" href="{{url('vendors/ace/ace.min.css')}}" /> 
  

@stop

@section('css_relative')

@stop

@section('contenido')
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="{{url('inicio')}}">Inicio</a>
			</li>
			<li>
				<a href="{{url('elementos')}}">Administración de Elementos</a>
			</li>
			<li class="active">Detalles Elemento</li>
		</ul><!-- /.breadcrumb -->
	</div>
	@foreach($elementos as $viewElemento)

	
	
	<div class="" role="main">
          <div class="">
            <div class="page-title">
              
			<div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>Información del Elemento</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{url('production/images/elementos')}}/{{$viewElemento->foto}}" alt="Avatar" title="{{$viewElemento->descripcion}} {{$viewElemento->marca->descripcion}}">
                        </div>
                    </div>
                      <h3><i class="fa fa-desktop"></i> {{$viewElemento->descripcion}} {{$viewElemento->marca->descripcion}}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-balance-scale user-profile-icon"></i> Peso. {{$viewElemento->peso}}
                        </li>

                        <li>
                          <i class="fa fa-paint-brush user-profile-icon"></i> Color. {{$viewElemento->color->descripcion}}
                        </li>

                        <li>
                          <i class="fa fa-tags user-profile-icon"></i> Tipo. {{$viewElemento->tipo->descripcion}}
                        </li>

                        <li>
                          <i class="fa fa-bullseye user-profile-icon"></i> Estado. {{$viewElemento->estado}}
                        </li>

                        <li>
                          <i class="fa fa-info user-profile-icon"></i> Observación. {{$viewElemento->observacion}}
                        </li>
                      </ul>

                      <a href="{{url('editElemento')}}/{{$viewElemento->id}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Editar Información</a>
                      

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Datos del Cliente</h2>
                        </div>
                        
                      </div>
                     

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     	 <br>
                        
                        
                          @foreach($dato as $datos)
                             <!-- cliente -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Nombres </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="nombres">{{$datos->nombre}}</span>
                                  </div>
                                </div>
                          
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Apellidos </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="apellidos">{{$datos->apellido}}</span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Identificacion </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="identificacion">{{$datos->identificacion}} de 
                                    @foreach($ciudad as $ciudad)
                                      @if($ciudad->id == $datos->exp_ciudades_id)
                                        {{$ciudad->nombre}}
                                      @endif
                                    @endforeach
                                    </span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Teléfono </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="telefono">{{$datos->telefono}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Celular </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="celular">{{$datos->celular}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Dirección </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="direccion">{{$datos->direccion}}</span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                <div class="profile-info-name">  </div>
                                  <div class="profile-info-value">
                                    <a href="{{url('viewCliente')}}/{{$empeno->clientes_id}}" class="btn btn-success"><i class="fa fa-eye m-right-xs"></i> Ver Cliente</a>
                                  </div>
                                </div>
                                
                              </div>
                            <!-- cliente-->
                          @endforeach
                          
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
	@endforeach
@stop

@section('scripts_page')
	 <!-- morris.js -->
    <script src="{{url('vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{url('vendors/morris.js/morris.min.js')}}"></script>
   
  
@stop

@section('scripts_relative')

	<script type="text/javascript">
		 
   
       
      
	</script>

@stop