@extends('plantilla')

@section('title')
	Detalles Cliente -
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
				<a href="{{url('inicio')}}">Inicio</a>
			</li>
			<li>
				<a href="{{url('clientes')}}">Administración de Clientes</a>
			</li>
			<li class="active">Detalles cliente</li>
		</ul><!-- /.breadcrumb -->
	</div>
	@foreach($clientes as $viewCliente)

	
	
	<div class="" role="main">
          <div class="">
            <div class="page-title">
              
			<div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Información del Cliente</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      
                      <h3><i class="fa fa-user"></i> {{$viewCliente->nombre}} {{$viewCliente->apellido}}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-credit-card user-profile-icon"></i> C.C. {{$viewCliente->identificacion}}
                        </li>

                        <li>
                          <i class="fa fa-map-marker user-profile-icon"></i> Expedido. {{$viewCliente->ciudad->nombre}}
                        </li>

                        <li>
                          <i class="fa fa-location-arrow user-profile-icon"></i> Dirección. {{$viewCliente->direccion}}
                        </li>

                        <li>
                          <i class="fa fa-phone user-profile-icon"></i> Telefono. {{$viewCliente->telefono}} <br> {{$viewCliente->celular}}
                        </li>
                      </ul>

                      <a href="{{url('editCliente')}}/{{$viewCliente->id}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Editar Información</a>
                      

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Registro de Actividad</h2>
                        </div>
                        
                      </div>
                     

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     	 <br>
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pago Realizados</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Elementos</a>
                          </li>
                          
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                             <!-- pagos -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Referencia</th>
                                  <th>Elemento</th>
                                  <th>Tipo Pago</th>
                                  <th>Valor</th>
                                  <th>Fecha</th>
                                 
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($pago as $pagos)
                                <tr>
                               
                                  <td>{{$pagos->num_empeño}}</td>
                                  <td>{{$pagos->descripcion}}</td>
                                  <td>{{$pagos->tipo}}</td>
                                  <td>{{$pagos->pago}}</td>
                                  <td>{{$pagos->fecha}}</td>
                                  
                                 
                                  <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                      <a class="blue" href="{{url('viewCliente')}}/{{$viewCliente->id}}">
                                        <i class="ace-icon fa fa-search bigger-130"></i>
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                               @endforeach
                               
                              </tbody>
                            </table>
                            <!-- pagos-->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- elementos -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Descripcion</th>
                                  <th>Marca</th>
                                  <th>Peso</th>
                                  <th>Color</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($viewCliente->elemento as $dato)
                                <tr>
                                  <td>{{$dato->descripcion}}</td>
                                  <td>{{$dato->marca->descripcion}}</td>
                                  <td>{{$dato->peso}}</td>
                                  <td>{{$dato->color->descripcion}}</td>
                                    
                                  <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                      <a class="blue" href="{{url('viewElemento')}}/{{$dato->id}}">
                                        <i class="ace-icon fa fa-search bigger-130"></i>
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                              @endforeach
                                
                              </tbody>
                            </table>
                            <!-- elementos -->

                          </div>
                          
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
		 $(function() {
        Morris.Bar({
          element: 'graph_bar',
          data: [
            { "period": "Jan", "Hours worked": 80 }, 
            { "period": "Feb", "Hours worked": 125 }, 
            { "period": "Mar", "Hours worked": 176 }, 
            { "period": "Apr", "Hours worked": 224 }, 
            { "period": "May", "Hours worked": 265 }, 
            { "period": "Jun", "Hours worked": 314 }, 
            { "period": "Jul", "Hours worked": 347 }, 
            { "period": "Aug", "Hours worked": 287 }, 
            { "period": "Sep", "Hours worked": 240 }, 
            { "period": "Oct", "Hours worked": 211 }
          ],
          xkey: 'period',
          hideHover: 'auto',
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          ykeys: ['Hours worked', 'sorned'],
          labels: ['Hours worked', 'SORN'],
          xLabelAngle: 60,
          resize: true
        });

        $MENU_TOGGLE.on('click', function() {
          $(window).resize();
        });
      });
    
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
        }

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
	</script>

@stop