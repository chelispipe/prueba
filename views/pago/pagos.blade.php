@extends('plantilla')

@section('title')
	Realizar
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
			<li ><a href="{{url('pagos')}}">Consultar</a></li>
			
			<li class="active">Realizar Pago</li>
		</ul><!-- /.breadcrumb -->
	</div>
	
	@foreach($empenos as $editPago)
	

	<div class="" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Realizar Pago </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{url('createPago')}}">

                    	

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Pago: <span class="required">*</span></label>
			                <div class="controls">
			                    <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
			                        <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Fecha de Pago" aria-describedby="inputSuccess2Status4" name="fecha" value="">
			                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
			                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
			                    </div>
			                </div>
			            </div>

			            <div class="divider-dashed"></div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Tipo Pago: <span class="required">*</span> </label>
										
							<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

								<select id="descripcion" name="descripcion" class="form-control  select2_single" required="required" tabindex="-1">
									<option></option>
												
									<option value="Abonar">Abonar</option>
									<option value="Retirar">Retirar</option>
													
								</select>
							</div>
						</div>

						<div class="divider-dashed"></div>

                     	<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="num_empeno">Num Referencia: <span class="required">*</span></label>

							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<input type="hidden" name="id_empeno" value="{{$editPago->id}}">
					            <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Número Referencia" required="required" name="num_empeno" value="{{$editPago->num_empeño}}" readonly>
					            <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
					        </div>
						</div>

						<div class="divider-dashed"></div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor: <span class="required">*</span></label>
			                <div class="controls">
			                    <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
			                        <input type="number" class="form-control has-feedback-left" id="single_cal4" placeholder="Valor" aria-describedby="inputSuccess2Status4" name="valor" value="">
			                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
			                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
			                    </div>
			                </div>
			            </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" id="btn_cancelar" class="btn btn-primary">Cancelar</button>
                    	  <button id="send" type="submit" class="btn btn-success">Realizar Pago</button>
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
    <!-- Select2 -->
    <script src="{{url('vendors/select2/dist/js/select2.full.min.js')}}"></script>
   
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
			location.href = url+'estados';
			});	

		});

 // select2
   
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Seleccione un Tipo de Pago",
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


	</script>
@stop