@extends('plantilla')

@section('title')
	Tipos de Elementos
@stop

@section('css_page')
	
    <!-- Datatables -->
    <link href="{{url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    
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
			<li class="active">Administración de Tipos de Elementos</li>
		</ul><!-- arbol de sitio -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->				
				<a class="btn btn-primary" data-toggle="modal" href='#createModal'><i class="fa fa-plus"></i> Crear Tipo Elemento</a>

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
										Cantidad de Tipos 										
										<span class="badge badge-success">{{$tipoElemento->count()}}</span>
									</a>
								</li>
																							
							</ul>

							<div class="tab-content">
								<div id="activos" class="tab-pane fade in active">
									<div class="row">
										<div class="col-xs-12">
											<h4 class="header smaller lighter blue">Listado de Tipos de Elementos</h4>

											<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>
											

											<!-- div.table-responsive -->

											<!-- inicia la tabla -->
											<div class="col-md-12 col-sm-12 col-xs-12">
								                <div class="x_panel">
								                  
								                  <div class="x_content">
								                    <p class="text-muted font-13 m-b-30">
								                      El siguiente listado pertenece a los tipos o categorias a la que puede pertenecer un elemento
								                    </p>
								                    <table id="datatable-buttons" class="table table-striped table-bordered">
								                      <thead>
								                        <tr>
								                          <th>Descripcion</th>
								                          <th>Acciones</th>
								                          
								                        </tr>
								                      </thead>


								                      <tbody>
								                      @foreach($tipoElemento as $tipoElemento)
								                        <tr>
								                          <td>{{$tipoElemento->descripcion}}</td>
								                          <td>
																<div class="hidden-sm hidden-xs action-buttons">
																	<a class="green" href="{{url('editTipoElemento')}}/{{$tipoElemento->id}}">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>

																	<a class="red" href="#" id="btn_eliminar" name="btn_eliminar" value="{{$tipoElemento->id}}">
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
																				<a href="{{url('editTipoElemento')}}/{{$tipoElemento->id}}" class="tooltip-success" data-rel="tooltip" title="Editar">
																					<span class="green">
																						<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a href="#" class="tooltip-error" data-rel="tooltip" title="Eliminar" id="btn_eliminar" name="btn_eliminar" value="{{$tipoElemento->id}}">
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
  				<!-- Modal crear Personal -->
				<div class="modal fade" id="createModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo TipoElemento</h4>
							</div>
							<div class="modal-body">
								
								<form class="form-horizontal" id="validation-form" method="post" action="{{url('createTipoElemento')}}">
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="descripcion">Descripcion:</label>

										<div class="col-sm-9">
											<div class="clearfix">
												<input type="text" name="descripcion" id="descripcion" class="col-xs-12 col-sm-9" />
											</div>
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
				<!-- END Modal crear Estado -->

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
   

@stop

@section('scripts_relative')
	<script type="text/javascript">

		// Tiempo del mensaje
			$('#alert').fadeOut(6000, function() {
				$(this).remove();
			});

		

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

        

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        

        TableManageButtons.init();
      });
		  

	</script>
@stop


