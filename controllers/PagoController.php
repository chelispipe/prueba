<?php 

class PagoController extends BaseController
{

// se muestra el modal pidiendo el numero de identificacion o cedula

	public function index()
	{
		
		return View::make('pago.home');
	}

// se consultan los elementos empeñados de la persona con respeto a la cedula que se ingreso

	public function consultar()
	{
		
		$clientes = Cliente::where('identificacion','=', Input::get('identificacion'))->get();
		
		if($clientes->count() == 0){
			Session::flash('message', 'El Cliente no se encuentra registrado o no tiene ningun elemento empeñado!');
			Session::flash('class', 'danger');
			return Redirect::to('pagos');
		}else{
			foreach ($clientes as $dato) {
			 	$empenos = Empeno::where('clientes_id', '=', $dato->id)->get();
			}

			return View::make('pago.listado',array('empenos' => $empenos, 'clientes' => $dato));
		}
	}

// realizar pagos

	public function generar($id)
	{
		$empenos = Empeno::where('id','=', $id)->get();

		return View::make('pago.pagos', array('empenos' => $empenos));
	}

// crear el pago y actualizacion de la tabla empeños

	public function create()
	{
		$pago = new Pago;

		$pago->fecha = Input::get('fecha');
		$pago->tipo = Input::get('descripcion');
		$pago->empeños_id = Input::get('id_empeno');
		$pago->pago = Input::get('valor');
		

		if ($pago->save()) {
			$empeno = Empeno::find(Input::get('id_empeno'));

			$empeno->cant_pagos = $empeno->cant_pagos + 1;
			$empeno->faltan_pagos = $empeno->faltan_pagos - 1;
			$empeno->total_pagos = $empeno->total_pagos + Input::get('valor');

			$empeno->save();

			Session::flash('message', 'El pago se ha realizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('pagos');
	}

	


	public function getEdit($id)
	{
		$estados = Estado::where('id','=', $id)->get();

		return View::make('estado.editar', array('estados' => $estados));
	}

	public function edit($id)
	{
		$estados = Estado::find($id);

		$estados->descripcion = Input::get('descripcion');
		

		if ($estados->save()) {
			Session::flash('message', 'estado Actualizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('estados');
	}

	
}