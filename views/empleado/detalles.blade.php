@extends('plantilla')

@section('title')
	Detalles Empleado -
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
				<a href="{{url('empleados')}}">Administración de Empleados</a>
			</li>
			<li class="active">Detalles Empleado</li>
		</ul><!-- /.breadcrumb -->
	</div>
	@foreach($empleados as $viewEmpleado)

	
	
	<div class="" role="main">
          <div class="">
            <div class="page-title">
              
			<div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>Información del Empleado</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{url('production/images/empleados')}}/{{$viewEmpleado->foto}}" alt="Avatar" title="{{$viewEmpleado->nombre}} {{$viewEmpleado->apellido}}">
                        </div>
                    </div>
                     
                        <h3 class="alert alert-success"><i class="fa fa-caret-right"></i> {{$viewEmpleado->nombre}} {{$viewEmpleado->apellido}} </h3>
                      

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-user user-profile-icon"></i> User. {{$viewEmpleado->user}}
                        </li>

                        <li>
                          <i class="fa fa-envelope-o user-profile-icon"></i> E-mail. {{$viewEmpleado->correo}}
                        </li>

                      </ul>

                      <a href="{{url('editEmpleado')}}/{{$viewEmpleado->id}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Editar Información</a>
                      

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Datos del Empleado</h2>
                        </div>
                        
                      </div>
                     

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     	 <br>
                        
                        

                             <!-- cliente -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Nombres </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="nombres">{{$viewEmpleado->nombre}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Apellidos </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="apellidos">{{$viewEmpleado->apellido}}</span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Identificacion </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="identificacion">{{$viewEmpleado->identificacion}} de {{$viewEmpleado->ciudad->nombre}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Teléfono </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="telefono">{{$viewEmpleado->telefono}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Celular </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="celular">{{$viewEmpleado->celular}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Dirección </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="direccion">{{$viewEmpleado->direccion}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Fecha Contratación </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="fecha">{{$viewEmpleado->fecha_ingreso}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Estado </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="estado">{{$viewEmpleado->estado->descripcion}}</span>
                                  </div>
                                </div>

                                
                              </div>
                            <!-- información-->

                          
                          
                          
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