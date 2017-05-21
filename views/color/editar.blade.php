@extends('home')

@section('title')
	Editar
@stop

@section('css_page')
	<link rel="stylesheet" href="{{url('assets/css/jquery.gritter.min.css')}}" />
	<link rel="stylesheet" href="{{url('assets/css/select2.min.css')}}" />
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
			<li ><a href="{{url('estados')}}">Administración Estados</a></li>
			<li class="active">Editar Estado</li>
		</ul><!-- /.breadcrumb -->
	</div>
	
	@foreach($estados as $editEstado)
	<div class="page-header">
		<h1>
			Editar Estado
		</h1>
	</div><!-- /.page-header -->

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->				
					<form class="form-horizontal" id="validation-form" method="post" action="{{url('editEstado')}}/{{$editEstado->estado_id}}">
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="descripcion">Descripcion:</label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="descripcion" id="descripcion" class="col-xs-12 col-sm-9" value="{{$editEstado->descripcion}}" />
								</div>
							</div>
						</div>

						
						<div class="modal-footer">
							<button type="button" id="btn_cancelar" class="btn btn-default">Cancelar</button>
							<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
						</div>
					</form>
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
	@endforeach
@stop

@section('scripts_page')
	<script src="{{url('assets/js/bootbox.js')}}"></script>
	<script src="{{url('assets/js/jquery.validate.min.js')}}"></script>
	<script src="{{url('assets/js/jquery-additional-methods.min.js')}}"></script>
	<script src="{{url('assets/js/jquery.maskedinput.min.js')}}"></script>
	<script src="{{url('assets/js/select2.min.js')}}"></script>
@stop

@section('scripts_relative')
	<script type="text/javascript">
		jQuery(function($) {

			
		
			$('#validation-form').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					descripcion: {
						required: true
					}
				},
		
				messages: {
					desrcipcion: "Debes ingresar una descripcion."
					
				},
		
		
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},
		
				success: function (e) {
					$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
					$(e).remove();
				},
		
				errorPlacement: function (error, element) {
					if(element.is('.select2')) {
						error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
					}
					else if(element.is('.chosen-select')) {
						error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
					}
					else error.insertAfter(element.parent());
				},
		
				submitHandler: function (form) {
					form.submit();
				},
				invalidHandler: function (form) {
				}
			});
			
			var url = '{{url()}}/';
			$('#btn_cancelar').click(function(event) {
				location.href = url+'estados';
			});							
			
			///////////
			$(document).one('ajaxloadstart.page', function(e) {
				$('[class*=select2]').remove();
			});
						
		});
	</script>
@stop