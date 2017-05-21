@extends('plantilla')

@section('title')
	Compra y Venta
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
			<li class="active">Administración de Compras y Ventas de Elementos</li>
		</ul><!-- arbol de sitio -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->				
				<a class="btn btn-primary" data-toggle="modal" href='#createModal'><i class="fa fa-plus"></i> Crear Compra o Venta</a>

				@if(Session::has('message'))
					<div id="alert">
						<div class="col-sm-12 hr hr-18 hr-double dotted"></div>
						<div class="col-sm-4 col-xs-12 col-sm-offset-4 alert alert-{{Session::get('class')}}">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{Session::get('message')}}
							<br>
						</div>
					</div>
				@endif
				<div class="hr hr-18 hr-double dotted"></div>
				<!-- Tabs para navegación entre ellas -->
				<div class="" role="tabpanel" data-example-id="togglable-tabs">
                     	 <br>
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <i class="green ace-icon fa fa-check bigger-120"></i> Cantidad Comprados <span class="badge badge-success">{{$compra->count()}}</span> </a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true"><i class="red ace-icon fa fa-close bigger-120"></i> Cantidad Vendidos <span class="badge badge-success">{{$venta->count()}}</span> </a>
                          </li>
                          
                        </ul>

                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                             <!-- activos -->
                            <!-- inicia la tabla -->
											<div class="col-md-12 col-sm-12 col-xs-12">
								                <div class="x_panel">
								                  
								                  <div class="x_content">
								                    <p class="text-muted font-13 m-b-30">
								                      El siguiente listado corresponde a los Elementos que se han comprado.
								                    </p>
								                    <table id="datatable-buttons" class="table table-striped table-bordered">
								                      <thead>
								                        <tr>
								                          <th>Fecha</th>
								                          <th>Empleado</th>
								                          <th>Descripcion</th>
								                          <th>Elemento</th>
								                          <th>Cliente</th>
								                          <th>Acciones</th>
								                          
								                        </tr>
								                      </thead>


								                      <tbody>
								                      @foreach($compra as $compra)
								                        <tr>
								                          <td>{{$compra->fecha}}</td>
								                          <td>{{$compra->empleado->nombre}} {{$compra->empleado->apellido}}</td>
								                          <td>{{$compra->descripcion}}</td>
								                          <td>{{$compra->descripcion}}<br>{{$compra->marca}}</td>
								                          <td>{{$compra->cliente}}</td>
								                          <td>
																<div class="hidden-sm hidden-xs action-buttons">
																	<a class="blue" href="{{url('viewEmpleado')}}/{{$compra->id}}">
																		<i class="ace-icon fa fa-search bigger-130"></i>
																	</a>

																	<a class="green" href="{{url('editEmpleado')}}/{{$compra->id}}">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>

																	<a class="red" href="{{url('desactivarEmpleado')}}/{{$compra->id}}" id="btn_eliminar" name="btn_eliminar" value="{{-- {{$compra->id}} --}}">
																		<i class="ace-icon fa fa-sign-out bigger-130"></i>
																	</a>
																</div>

																<div class="hidden-md hidden-lg">
																	<div class="inline pos-rel">
																		<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																			<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																			

																			<li>
																				<a href="{{url('viewEmpleado')}}/{{$compra->id}}" class="tooltip-success" data-rel="tooltip" title="Detalles">
																					<span class="blue">
																						<i class="ace-icon fa fa-search bigger-120"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a href="{{url('editEmpleado')}}/{{$compra->id}}" class="tooltip-success" data-rel="tooltip" title="Editar">
																					<span class="green">
																						<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																					</span>
																				</a>
																			</li>
																			<li>
																				<a href="{{url('desactivarEmpleado')}}/{{$compra->id}}" class="tooltip-error btn btn-default source" data-rel="tooltip" title="Eliminar" id="btn_eliminar" name="btn_eliminar" value="{{-- {{$compra->id}} --}}">
																					<span class="red">
																						<i class="ace-icon fa fa-sign-out bigger-120"></i>
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
								              </div> {{-- termina la tabla --}}
                            <!-- activos-->

                          </div>
                          <div role="tabpanel" class="tab-pane fade in" id="tab_content2" aria-labelledby="home-tab">

                            <!-- inactivo -->
                            <!-- inicia la tabla -->
											<div class="col-md-12 col-sm-12 col-xs-12">
								                <div class="x_panel">
								                  
								                  <div class="x_content">
								                    <p class="text-muted font-13 m-b-30">
								                      El siguiente listado corresponde a los compra que se encuentran activos en el sistema.
								                    </p>
								                    <table id="inactiva" class="table table-striped table-bordered ">
								                      <thead>
								                        <tr>
								                          <th>Identificación</th>
								                          <th>Nombre Completo</th>
								                          <th>Dirección</th>
								                          <th>Teléfonos</th>
								                          <th>Acciones</th>
								                          
								                        </tr>
								                      </thead>


								                      <tbody>
								                      @foreach($inactivos as $inactivos)
								                        <tr>
								                          <td>{{$inactivos->identificacion}}</td>
								                          <td>{{$inactivos->nombre}} {{$inactivos->apellido}}</td>
								                          <td>{{$inactivos->direccion}}</td>
								                          <td>{{$inactivos->telefono}}<br>{{$inactivos->celular}}</td>
								                          <td>
																<div class="hidden-sm hidden-xs action-buttons">
																	<a class="blue" href="{{url('viewEmpleado')}}/{{$inactivos->id}}">
																		<i class="ace-icon fa fa-search bigger-130"></i>
																	</a>

																	<a class="green" href="{{url('editEmpleado')}}/{{$inactivos->id}}">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>

																	<a class="blue" href="{{url('activarEmpleado')}}/{{$empleados->id}}" id="btn_eliminar" name="btn_eliminar" value="{{-- {{$inactivos->id}} --}}">
																		<i class="ace-icon fa fa-check-square-o bigger-130"></i>
																	</a>
																</div>

																<div class="hidden-md hidden-lg">
																	<div class="inline pos-rel">
																		<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																			<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																			

																			<li>
																				<a href="{{url('viewEmpleado')}}/{{$inactivos->id}}" class="tooltip-success" data-rel="tooltip" title="Detalles">
																					<span class="blue">
																						<i class="ace-icon fa fa-search bigger-120"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a href="{{url('editEmpleado')}}/{{$inactivos->id}}" class="tooltip-success" data-rel="tooltip" title="Editar">
																					<span class="green">
																						<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																					</span>
																				</a>
																			</li>
																			<li>
																				<a href="{{url('activarEmpleado')}}/{{$empleados->id}}" class="tooltip-error btn btn-default source" data-rel="tooltip" title="Eliminar" id="btn_eliminar" name="btn_eliminar" value="{{-- {{$inactivos->id}} --}}">
																					<span class="blue">
																						<i class="ace-icon fa fa-check-square-o bigger-120"></i>
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
								              </div> {{-- termina la tabla --}}
                            <!-- inactivos -->

                          </div>
                          
                        </div>
                      </div>
  				<!-- Modal crear empleados -->
				<div class="modal fade" id="createModal">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo Empleado</h4>
							</div>
							<div class="modal-body">
								
								<form class="form-horizontal" id="validation-form" method="post" action="{{url('createEmpleado')}}">
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identificacion">Identificación: <span class="required">*</span></label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Identificacion" required="required" name="identificacion">
					                        <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ciudades_id">Exp Documento: <span class="required">*</span> </label>
										
										<div class="col-xs-12 col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

											<select id="exp_ciudades_id" name="ciudades_id" class="form-control  select2_single" required="required" tabindex="-1">
												<option></option>
												@foreach($ciudades as $ciudades)
													<option value="{{$ciudades->id}}">{{ $ciudades->nombre}}</option>
												@endforeach	
											</select>
										</div>
									</div>
									

									<div class="divider-dashed"></div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombres: <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombres" required="required" name="nombre">
					                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellidos: <span class="required">*</span></label>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Apellidos" required="required" name="apellido">
					                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
									
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
									

									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Número de teléfono: </label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        
					                        <input type="text" class="form-control has-feedback-left" data-inputmask="'mask' : '(999) 999-9999'"  name="telefono" placeholder="Numero de Telefono">
					                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
									

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">Número de celular: </label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="text" class="form-control has-feedback-left" data-inputmask="'mask' : '(999) 999-9999'"  name="celular" placeholder="Numero de Celular">
					                        <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>
									
									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección: <span class="required">*</span></label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="text" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Dirección" name="direccion" required="required">
					                        <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="divider-dashed"></div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo: <span class="required">*</span></label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="text" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Correo" name="correo" required="required">
					                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
					                    </div>
									</div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Usuario: <span class="required">*</span></label>

										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					                        <input type="text" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Usuario" name="user" required="required">
					                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
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
				<!-- END Modal crear empleados -->

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

// tablas activa

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

       

        TableManageButtons.init();

      });
	
      // inactiva

      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#inactiva").length) {
            $("#inactiva").DataTable({
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
              responsive: false
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

	</script>
@stop


