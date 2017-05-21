@extends('plantilla')

@section('title')
	Editar
@stop

@section('css_page')
	 <!-- Select2 -->
    <link href="{{url('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
@stop

@section('css_relative')

@stop

@section('contenido')
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="{{url('home')}}">Inicio</a>
			</li>
			<li ><a href="{{url('empenos')}}">Administración de Empeños</a></li>
			<li class="active">Editar Empeño </li>
		</ul><!-- /.breadcrumb -->
	</div>
	
	@foreach($empenos as $editEmpeno)
	

	<div class="" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h4>Actualizar Información Empeño #</h4> <h2><i class="fa fa-barcode"></i> {{$editEmpeno->num_empeño}}</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{url('editEmpeno')}}/{{$editEmpeno->id}}">

                     				<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="num_empeno">Num Referencia: <span class="required">*</span></label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Número Referencia" required="required" name="num_empeno" value="{{$editEmpeno->num_empeño}}">
					                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="clientes_id">Cliente: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<select id="clientes_id" name="clientes_id" class="form-control  select2_single" required="required" tabindex="-1">
												<option></option>
												@foreach($clientes as $clientes)
													@if($clientes->id == $editEmpeno->clientes_id)
														<option selected value="{{$clientes->id}}">{{$clientes->nombre}} {{$clientes->apellido}}</option>
													@else
														<option value="{{$clientes->id}}">{{$clientes->nombre}} {{$clientes->apellido}}</option>
													@endif
												@endforeach	
											</select>
										</div>
									</div>

									

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="elementos_id">Elemento: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<select id="elementos_id" name="elementos_id" class="form-control  select2_single" required="required" tabindex="-1">
												<option></option>
												@foreach($elementos as $elementos)
													@if($elementos->id == $editEmpeno->elementos_id)
														<option selected value="{{$elementos->id}}">{{ $elementos->descripcion}}</option>
													@else
														<option value="{{$elementos->id}}">{{ $elementos->descripcion}}</option>
													@endif
												@endforeach	
											</select>
										</div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor: <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="valor" required="required" name="valor" value="{{$editEmpeno->valor}}">
					                        <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="plazo_sacar">Plazo (Meses): <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Plazo de Retiro" required="required" name="plazo_sacar" value="{{$editEmpeno->plazo_sacar}}">
					                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cant_pagos">Cant Pagos: <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
											@if($editEmpeno->cant_pagos == "")
												<input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Cantidad Pagos" required="required" name="cant_pagos" value="0">
											@else
					                        	<input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Cantidad Pagos" required="required" name="cant_pagos" value="{{$editEmpeno->cant_pagos}}">
					                        @endif
					                        <span class="fa fa-bar-chart form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="faltan_pagos">Pagos Pendientes: <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
											@if($editEmpeno->faltan_pagos == "")
					                        	<input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder=" Pagos Pendientes" required="required" name="faltan_pagos" value="{{$editEmpeno->plazo_sacar}}">
					                        @else
					                        	<input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder=" Pagos Pendientes" required="required" name="faltan_pagos" value="{{$editEmpeno->faltan_pagos}}">
					                        @endif
					                        <span class="fa fa-bookmark form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="empleados_id">Cajero: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<select id="empleados_id" name="empleados_id" class="form-control  select2_single" required="required" tabindex="-1">
												<option></option>
												@foreach($empleados as $empleados)
													@if($empleados->id == $editEmpeno->empleados_id)
														<option selected value="{{$empleados->id}}">{{$empleados->nombre}} {{$empleados->apellido}}</option>
													@else
														<option value="{{$empleados->id}}">{{$empleados->nombre}} {{$empleados->apellido}}</option>
													@endif
												@endforeach	
											</select>
										</div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_ingreso">Fecha Ingreso: <span class="required">*</span></label>
			                            <div class="controls">
			                              <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
			                                <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Fecha Ingreso" aria-describedby="inputSuccess2Status4" name="fecha_ingreso" value="{{$editEmpeno->fecha_ingreso}}">
			                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
			                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
			                              </div>
			                            </div>
			                        </div>

			                        <div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_retiro">Fecha Retiro: <span class="required">*</span></label>
			                            <div class="controls">
			                              <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
			                                <input type="text" class="form-control has-feedback-left" id="fecha_retiro" placeholder="Fecha Retiro" aria-describedby="inputSuccess2Status4" name="fecha_retiro" value="{{$editEmpeno->fecha_retiro}}">
			                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
			                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
			                              </div>
			                            </div>
			                        </div>

			                        <div class="divider-dashed"></div>

			                        <div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_pagos">Total Pagos: <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
											@if($editEmpeno->total_pagos == "")
												<input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Total Pagos" required="required" name="total_pagos" value="0">
											@else
					                        	<input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Total Pagos" required="required" name="total_pagos" value="{{$editEmpeno->total_pagos}}">
					                        @endif
					                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="estados_id">Estado: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<select id="estados_id" name="estados_id" class="form-control  select2_single" required="required" tabindex="-1">
												<option></option>
												@foreach($estados as $estados)
													@if($estados->id == $editEmpeno->estados_id)
														<option selected value="{{$estados->id}}">{{$estados->descripcion}}</option>
													@else
														<option value="{{$estados->id}}">{{$estados->descripcion}}</option>
													@endif
												@endforeach	
											</select>
										</div>
									</div>

									<div class="divider-dashed"></div>

			                 		<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacion">Observación: </label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="text" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Observación" name="observacion" >
					                        <span class="fa fa-file-o form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
                      @endforeach	
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" id="btn_cancelar" class="btn btn-primary">Cancelar</button>
                    	  <button id="send" type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	
@stop

@section('scripts_page')
    <script src="{{url('vendors/validator/validator.js')}}"></script>
    <!-- jquery.inputmask -->
    <script src="{{url('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>

    
    <!-- Select2 -->
    <script src="{{url('vendors/select2/dist/js/select2.full.min.js')}}"></script>
   
@stop


@section('scripts_relative')
	<script type="text/javascript">
		
			// Tiempo del mensaje
			$('#alert').fadeOut(6000, function() {
				$(this).remove();
			});

		// validar campos
		 // initialize the validator function
	      	validator.message.date = 'falta este campo por llenar';

	      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
	      $('form')
	        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
	        .on('change', 'select.required', validator.checkField)
	        .on('keypress', 'input[required][pattern]', validator.keypress);

	      $('.multi.required').on('keyup blur', 'input', function() {
	        validator.checkField.apply($(this).siblings().last()[0]);
	      });

	      $('form').submit(function(e) {
	        e.preventDefault();
	        var submit = true;

	        // evaluate the form using generic validaing
	        if (!validator.checkAll($(this))) {
	          submit = false;
	        }

	        if (submit)
	          this.submit();

	        return false;
	      });	

	     	
			
	     // select2
   
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Seleccione una Ciudad",
          allowClear: true,
          width:'100%'
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    
		
  // fin select2
      

    // mascara para los input de telefono
      $(document).ready(function() {
        $(":input").inputmask();
      });
     //fin mascara		
	      
	      // boton cancelar

	    jQuery(function($) {
	     	var url = '{{url()}}/';
		    $('#btn_cancelar').click(function(event) {
			location.href = url+'empenos';
			});	

		});

		 //calendario

	 $(document).ready(function() {
        
        $('#single_cal4').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });

	//fin calendario

	//calendario fecha retiro

	 $(document).ready(function() {
        
        $('#fecha_retiro').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });

	//fin calendario fecha retiro
	</script>
@stop