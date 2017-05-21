@extends('plantilla')

@section('title')
	Empeños
@stop

@section('css_page')
	
    <!-- Datatables -->
    <link href="{{url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    
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
				<a href="{{url('inicio')}}">Inicio</a>
			</li>
			<li class="active">Administración de Empeños</li>
		</ul><!-- arbol de sitio -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->				
				<a class="btn btn-primary" data-toggle="modal" href='#createModal'><i class="fa fa-plus"></i> Crear Empeño</a>

				@if(Session::has('message'))
					<div id="alert">
						<div class="col-sm-12 hr hr-18 hr-double dotted"></div>
						<div class="col-sm-4 col-xs-12 col-sm-offset-4 alert alert-{{Session::get('class')}}">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{Session::get('message')}}
						</div>
					</div>
				@endif
				<div class="hr hr-18 hr-double dotted"></div>
				<!-- Tabs para navegación entre ellas -->
				<div class="row">
					<div class="col-sm-12">
						<br>
						<div class="tabbable">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active">
									<a data-toggle="tab" href="#activos">
										<i class="green ace-icon fa fa-check bigger-120"></i>
										Cantidad de Empeños										
										<span class="badge badge-success">{{$empenos->count()}}</span>
									</a>
								</li>
																							
							</ul>

							<div class="tab-content">
								<div id="activos" class="tab-pane fade in active">
									<div class="row">
										<div class="col-xs-12">
											<h4 class="header smaller lighter blue">Listado de Empeños</h4>

											<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>
											

											<!-- div.table-responsive -->

											<!-- inicia la tabla -->
											<div class="col-md-12 col-sm-12 col-xs-12">
								                <div class="x_panel">
								                  
								                  <div class="x_content">
								                    <p class="text-muted font-13 m-b-30">
								                      El siguiente listado corresponde a los empeños que se han realizado en la compraventa.
								                    </p>
								                    <table id="datatable-buttons" class="table table-striped table-bordered">
								                      <thead>
								                        <tr>
								                          <th>Referencia</th>
								                          <th>Cliente</th>
								                          <th>Elemento</th>
								                          <th>Valor</th>
								                          <th>Fecha Ingreso</th>
								                          <th>Fecha Retiro</th>
								                          <th>Acciónes</th>
								                          
								                        </tr>
								                      </thead>


								                      <tbody>
								                      @foreach($empenos as $empenos)
								                        <tr>
								                          <td>{{$empenos->num_empeño}}</td>
								                          <td>{{$empenos->clientes->nombre}} {{$empenos->clientes->apellido}}</td>
								                          <td>{{$empenos->elementos->descripcion}}</td>
								                          <td>{{$empenos->valor}}</td>
								                          <td>{{$empenos->fecha_ingreso}}</td>
								                          <td>{{$empenos->fecha_retiro}}</td>
								                          <td>
																<div class="hidden-sm hidden-xs action-buttons">
																	<a class="blue" href="{{url('viewEmpeno')}}/{{$empenos->id}}">
																		<i class="ace-icon fa fa-search bigger-130"></i>
																	</a>

																	<a class="green" href="{{url('editEmpeno')}}/{{$empenos->id}}">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>

																	<a class="red" href="#" id="btn_eliminar" name="btn_eliminar" value="{{$empenos->id}}">
																		<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a>
																</div>

																<div class="hidden-md hidden-lg">
																	<div class="inline pos-rel">
																		<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																			<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																			

																			<li>
																				<a href="{{url('viewEmpeno')}}/{{$empenos->id}}" class="tooltip-success" data-rel="tooltip" title="Detalles">
																					<span class="blue">
																						<i class="ace-icon fa fa-search bigger-120"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a href="{{url('editEmpeno')}}/{{$empenos->id}}" class="tooltip-success" data-rel="tooltip" title="Editar">
																					<span class="green">
																						<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																					</span>
																				</a>
																			</li>
																			<li>
																				<a href="#" class="tooltip-error btn btn-default source" data-rel="tooltip" title="Eliminar" id="btn_eliminar" name="btn_eliminar" value="{{$empenos->id}}">
																					<span class="red">
																						<i class="ace-icon fa fa-trash-o bigger-120"></i>
																					</span>
																				</a>
																			</li>

																		</ul>
																	</div>
																</div>
															</td>
								                        </tr>
								                       @endforeach
								                        
								                      </tbody>
								                    </table>
								                  </div>
								                </div>
								              </div>
							              </div> {{-- col-x-12 --}}
										</div> {{-- row --}}
									</div> {{-- activos --}}
								
								</div> {{-- content --}}
								

							</div> {{-- tab --}}
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<!-- END tabs -->
  				<!-- Modal crear empeños -->
				<div class="modal fade" id="createModal">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo Empeño</h4>
							</div>
							<div class="modal-body">
								
								<form class="form-horizontal" id="validation-form" method="post" action="{{url('createEmpeno')}}">
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="num_empeño">Num Referencia: <span class="required">*</span></label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Número Referencia" required="required" name="num_empeño">
					                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="clientes_id">Cliente: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<select id="clientes_id" name="clientes_id" class="form-control  select2_single" required="required" tabindex="-1">
												<option></option>
												@foreach($clientes as $clientes)
													<option value="{{$clientes->id}}">{{$clientes->nombre}} {{$clientes->apellido}}</option>
												@endforeach	
											</select>
										</div>
									</div>

									

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="elementos_id">Elemento: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<select id="elementos_id" name="elementos_id" class="form-control  select2_single" required="required" tabindex="-1">
												<option></option>
												@foreach($disponible as $disponible)
													<option value="{{$disponible->id}}">{{ $disponible->descripcion}}</option>
												@endforeach	
											</select>
										</div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor: <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="valor" required="required" name="valor">
					                        <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="plazo_sacar">Plazo (Meses): <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="plazo_sacar" required="required" name="plazo_sacar">
					                        <span class="fa fa-history form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>


									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="empleados_id">Cajero: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<input type="hidden" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Número Referencia"  name="empleados_id" value="{{Auth::User()->id}}">
											<input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Número Referencia"  name="empleado" value="{{Auth::User()->nombre}} {{Auth::User()->apellido}}" readonly>
					                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
										</div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_ingreso">Fecha Ingreso: <span class="required">*</span></label>
			                            <div class="controls">
			                              <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
			                                <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Fecha Ingreso" aria-describedby="inputSuccess2Status4" name="fecha_ingreso">
			                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
			                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
			                              </div>
			                            </div>
			                        </div>

			                        <div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_retiro">Fecha Retiro: <span class="required">*</span></label>
			                            <div class="controls">
			                              <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
			                                <input type="text" class="form-control has-feedback-left" id="fecha_retiro" placeholder="Fecha Retiro" aria-describedby="inputSuccess2Status4" name="fecha_retiro">
			                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
			                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
			                              </div>
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

							</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary">Crear</button>
									</div>
								</form>
						</div>
					</div>
				</div>
				<!-- END Modal crear elementos -->

				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
@stop

@section('scripts_page')	
    <!-- Datatables -->
    <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>
    <script src="{{url('vendors/jszip/dist/jszip.min.js')}}"></script>

    <script src="{{url('vendors/validator/validator.js')}}"></script>
    <!-- jquery.inputmask -->
    <script src="{{url('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>

    
    <!-- Select2 -->
    <script src="{{url('vendors/select2/dist/js/select2.full.min.js')}}"></script>

    <!-- Cropper -->
    <script src="{{url('vendors/cropper/dist/cropper.min.js')}}"></script>
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

	     	
			
	   // select2 clientes
   
      $(document).ready(function() {
        $("#clientes_id").select2({
          placeholder: "Seleccione el Cliente",
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
    
		
  // fin select2 clientes

  // select2 empleados
   
      $(document).ready(function() {
        $("#empleados_id").select2({
          placeholder: "Seleccione un Empleado",
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
    
		
  // fin select2 empleados

  // select2 elementos
   
      $(document).ready(function() {
        $("#elementos_id").select2({
          placeholder: "Seleccione un Elemento",
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
    
		
  // fin select2 elementos
      

    // mascara para los input de telefono
      $(document).ready(function() {
        $(":input").inputmask();
      });
     //fin mascara

// tablas

      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();



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


