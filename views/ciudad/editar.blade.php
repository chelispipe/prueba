@extends('plantilla')

@section('title')
	Editar
@stop

@section('css_page')

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
			<li ><a href="{{url('ciudades')}}">Administración de Ciudades</a></li>
			<li class="active">Editar Ciudad</li>
		</ul><!-- /.breadcrumb -->
	</div>
	
	@foreach($ciudades as $editCiudad)
	

	<div class="" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Ciudad </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{url('editCiudad')}}/{{$editCiudad->id}}">

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nombre" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Ingrese una nombre" required="required" type="text" value="{{$editCiudad->nombre}}">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
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
	@endforeach
@stop

@section('scripts_page')
    <!-- validator -->
    <script src="{{url('vendors/validator/validator.js')}}"></script>
   
@stop


@section('scripts_relative')
	<script type="text/javascript">
		
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
	      
	     jQuery(function($) {
	     	var url = '{{url()}}/';
		    $('#btn_cancelar').click(function(event) {
			location.href = url+'ciudades';
			});	

		});
	</script>
@stop