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
			<li ><a href="{{url('elementos')}}">Administración de Elementos</a></li>
			<li class="active">Editar Cliente </li>
		</ul><!-- /.breadcrumb -->
	</div>
	
	@foreach($elementos as $editElemento)
	

	<div class="" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h4>Actualizar Información</h4><br> <h2><i class="fa fa-user"></i> {{$editElemento->nombre}} {{$editElemento->apellido}}</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{url('editElemento')}}/{{$editElemento->id}}">

                     	<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción: <span class="required">*</span></label>

							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Descripción" required="required" name="descripcion" value="{{$editElemento->descripcion}}">
					            <span class="fa fa-desktop form-control-feedback left" aria-hidden="true"></span>
					        </div>
						</div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso">Peso: <span class="required">*</span></label>

							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Peso" required="required" name="peso" value="{{$editElemento->peso}}">
					            <span class="fa fa-balance-scale form-control-feedback left" aria-hidden="true"></span>
					        </div>
						</div>
	@endforeach
                        <div class="item form-group">

							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_elementos_id">Tipo Elemento: <span class="required">*</span> </label>
										
							<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								
								<select id="tipo_elementos_id" name="tipo_elementos_id" class="form-control  select2_single" required="required" tabindex="-1">

									<option></option>
										@foreach($tipo_elemento as $tipo_elemento)
											@if($tipo_elemento->id == $editElemento->tipo_elementos_id)
												<option selected value="{{$tipo_elemento->id}}">{{ $tipo_elemento->descripcion}}</option>
												
											@else
												<option value="{{$tipo_elemento->id}}">{{ $tipo_elemento->descripcion}}</option>
											@endif
										@endforeach	
								</select>
								
							</div>
						</div>
						
						<div class="item form-group">

							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="colores_id">Color: <span class="required">*</span> </label>
										
							<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								
								<select id="colores_id" name="colores_id" class="form-control  select2_single" required="required" tabindex="-1">

									<option></option>
										@foreach($colores as $colores)
											@if($colores->id == $editElemento->colores_id)
												<option selected value="{{$colores->id}}">{{ $colores->descripcion}}</option>
												
											@else
												<option value="{{$colores->id}}">{{ $colores->descripcion}}</option>
											@endif
										@endforeach	
								</select>
								
							</div>
						</div>

						<div class="item form-group">

							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="marcas_id">Marca: <span class="required">*</span> </label>
										
							<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								
								<select id="marcas_id" name="marcas_id" class="form-control  select2_single" required="required" tabindex="-1">

									<option></option>
										@foreach($marca as $marca)
											@if($marca->id == $editElemento->marcas_id)
												<option selected value="{{$marca->id}}">{{ $marca->descripcion}}</option>
												
											@else
												<option value="{{$marca->id}}">{{ $marca->descripcion}}</option>
											@endif
										@endforeach	
								</select>
								
							</div>
						</div>			

						<div class="divider-dashed"></div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacion">Observación: </label>

							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					            <input type="text" class="form-control has-feedback-left"  name="observacion" placeholder="Observación" value="{{$editElemento->observacion}}">
					            <span class="fa fa-file-o form-control-feedback left" aria-hidden="true"></span>
					        </div>
						</div>

						<div class="item form-group">

							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado">Estado: <span class="required">*</span> </label>
										
							<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								
								<select id="estado" name="estado" class="form-control  select2_single" required="required" tabindex="-1">

									<option></option>
									@if($editElemento->estado == "Disponible")
										<option selected value="Disponible">Disponible</option>
										<option value="Empeñado">Empeñado</option>
									@else
										<option value="Disponible">Disponible</option>
										<option selected value="Empeñado">Empeñado</option>
									@endif
								</select>
								
							</div>
						</div>
						
                      
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
			location.href = url+'elementos';
			});	

		});
	</script>
@stop