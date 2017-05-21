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
				<a href="{{url('empenos')}}">Administración de Empeños</a>
			</li>
			<li class="active">Detalles Empeño</li>
		</ul><!-- /.breadcrumb -->
	</div>
	@foreach($empenos as $viewEmpeno)

	
	
	<div class="" role="main">
          <div class="">
            <div class="page-title">
              
			<div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>Información del Empeño <i class="fa fa-barcode"></i> {{$viewEmpeno->num_empeño}}</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{url('production/images/lenovo.jpg')}}" alt="Avatar" title="{{$viewEmpeno->elementos->descripcion}}">
                        </div>
                    </div>
                      <h3><i class="fa fa-desktop"></i> {{$viewEmpeno->elementos->descripcion}} {{$viewEmpeno->elementos->marca->descripcion}}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-balance-scale user-profile-icon"></i> Peso. {{$viewEmpeno->elementos->peso}}
                        </li>

                        <li>
                          <i class="fa fa-paint-brush user-profile-icon"></i> Color. {{$viewEmpeno->elementos->color->descripcion}}
                        </li>

                        <li>
                          <i class="fa fa-tags user-profile-icon"></i> Tipo. {{$viewEmpeno->elementos->tipo->descripcion}}
                        </li>

                        <li>
                          <i class="fa fa-info user-profile-icon"></i> Observación. {{$viewEmpeno->elementos->observacion}}
                        </li>
                      </ul>

                      <a href="{{url('viewElemento')}}/{{$viewEmpeno->elementos_id}}" class="btn btn-success"><i class="fa fa-eye m-right-xs"></i> Ver Elemento</a>
                      

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Cliente: {{$viewEmpeno->clientes->nombre}} {{$viewEmpeno->clientes->apellido}} <a href="{{url('viewCliente')}}/{{$viewEmpeno->clientes->id}}" class="tooltip-success" data-rel="tooltip" title="Ver Cliente">
                                          <span class="blue">
                                            <i class="ace-icon fa fa-search bigger-120 "></i>
                                          </span>
                                        </a></h2>
                        </div>
                        
                      </div>
                     

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     	 <br>
                        
                        

                             <!-- cliente -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Num Referencia </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="nombres">{{$viewEmpeno->num_empeño}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Fecha Ingreso </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="apellidos">{{$viewEmpeno->fecha_ingreso}} </span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Fecha Retiro </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="apellidos">{{$viewEmpeno->fecha_retiro}} </span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Plazo Sacar </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="identificacion">{{$viewEmpeno->plazo_sacar}} Meses</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> valor Prestado</div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="telefono">{{$viewEmpeno->valor}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Cant Pagos </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="celular">{{$viewEmpeno->cant_pagos}} Pagos Realizados</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Pendientes </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="direccion">{{$viewEmpeno->faltan_pagos}} Pagos</span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Total Pagos </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="direccion">{{$viewEmpeno->total_pagos}} Abonados</span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Empleado </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="direccion">{{$viewEmpeno->empleados->nombre}} {{$viewEmpeno->empleados->apellido}} </span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Estado Empeño </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="direccion">{{$viewEmpeno->estados->descripcion}} </span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Observación </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="direccion">{{$viewEmpeno->observacion}} </span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                <div class="profile-info-name">  </div>
                                  <div class="profile-info-value">
                                    <a href="{{-- {{url('editElemento')}}/{{$viewElemento->id}} --}}" class="btn btn-success"><i class="fa fa-print m-right-xs"></i>  Imprimir Registro</a> <a href="{{-- {{url('editElemento')}}/{{$viewElemento->id}} --}}" class="btn btn-success"><i class="fa fa-print m-right-xs"></i>  Generar Factura</a>
                                  </div>
                                </div>
                                
                              </div>
                            <!-- cliente-->

                          
                          
                          
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