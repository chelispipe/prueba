<?php 

class EmpenoController extends BaseController
{
	public function index()
	{
		$empenos = Empeno::all();
		$elementos = Elemento::all();
		$disponible = Elemento::where('estado','=', 'disponible')->get();
		$clientes = Cliente::all();
		$empleados = Empleado::all();
		return View::make('empeno.home',array('empenos' => $empenos, 'elementos' => $elementos,'disponible' => $disponible, 'clientes' => $clientes, 'empleados' => $empleados));
	}

	public function create()
	{
		$empenos = new Empeno;


		$empenos->num_empeño = Input::get('num_empeño');
		$empenos->clientes_id = Input::get('clientes_id');
		$empenos->elementos_id = Input::get('elementos_id');
		$empenos->valor = Input::get('valor');
		$empenos->plazo_sacar = Input::get('plazo_sacar');
		$empenos->cant_pagos = 0;
		$empenos->faltan_pagos = Input::get('plazo_sacar');;
		$empenos->empleados_id = Input::get('empleados_id');
		$empenos->fecha_ingreso = Input::get('fecha_ingreso');
		$empenos->fecha_retiro = Input::get('fecha_retiro');
		$empenos->total_pagos = 0;
		$empenos->estados_id = 1;
		$empenos->observacion = Input::get('observacion');
		
		

		if ($empenos->save()) {
			$elemento = Elemento::find(Input::get('elementos_id'));
			$elemento->estado = 'Empeñado';
			$elemento->save();
			Session::flash('message', 'Empeno creado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('empenos');
	}

	public function get($id)
	{

		$empenos = Empeno::where('id','=', $id)->get();
		$elementos = Elemento::all();
		$clientes = Cliente::all();
		$empleados = Empleado::all();
		$estados = Estado::all();

		
		return View::make('empeno.detalles',array('empenos' => $empenos, 'elementos' => $elementos, 'clientes' => $clientes, 'empleados' => $empleados, 'estados' => $estados));
	}


	public function getEdit($id)
	{
		$empenos = Empeno::where('id','=', $id)->get();
		$elementos = Elemento::all();
		$clientes = Cliente::all();
		$empleados = Empleado::all();
		$estados = Estado::all();
		return View::make('empeno.editar',array('empenos' => $empenos, 'elementos' => $elementos, 'clientes' => $clientes, 'empleados' => $empleados, 'estados' => $estados));
	}

	public function edit($id)
	{
		$empenos = Empeno::find($id);

		$empenos->num_empeño = Input::get('num_empeno');
		$empenos->clientes_id = Input::get('clientes_id');
		$empenos->elementos_id = Input::get('elementos_id');
		$empenos->valor = Input::get('valor');
		$empenos->plazo_sacar = Input::get('plazo_sacar');
		$empenos->cant_pagos = Input::get('cant_pagos');
		$empenos->faltan_pagos = Input::get('faltan_pagos');
		$empenos->empleados_id = Input::get('empleados_id');
		$empenos->fecha_ingreso = Input::get('fecha_ingreso');
		$empenos->fecha_retiro = Input::get('fecha_retiro');
		$empenos->total_pagos = Input::get('total_pagos');
		$empenos->estados_id = Input::get('estados_id');
		$empenos->observacion = Input::get('observacion');
		

		if ($empenos->save()) {
			Session::flash('message', 'Empeño Actualizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('empenos');
	}

	public function delete($id)
	{
		
		$empenos = Empeno::where('id','=', $id);

		if ($empenos->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('empenos');
	}
}