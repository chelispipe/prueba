<?php 

class EmpleadoController extends BaseController
{
	public function index()
	{
		$empleados = Empleado::where('estados_id','=',1)->get();
		$inactivos = Empleado::where('estados_id','=',2)->get();
		$ciudades = Ciudad::all();
		$estados = Estado::all();
		return View::make('empleado.home',array('empleados' => $empleados, 'inactivos' => $inactivos,'ciudades' => $ciudades,'estados' => $estados));
	}

	public function create()
	{
		$empleados = new Empleado;

		$empleados->identificacion = Input::get('identificacion');
		$empleados->ciudades_id = Input::get('ciudades_id');
		$empleados->nombre = Input::get('nombre');
		$empleados->apellido = Input::get('apellido');
		$empleados->fecha_ingreso = Input::get('fecha_ingreso');
		$empleados->telefono = Input::get('telefono');
		$empleados->celular = Input::get('celular');
		$empleados->direccion = Input::get('direccion');
		$empleados->correo = Input::get('correo');
		$empleados->user = Input::get('user');
		$empleados->password = Hash::make(Input::get('identificacion'));
		$empleados->estados_id = 1;
		$file = Input::file('foto');
		$empleados->foto = $file->getClientOriginalName();
		

		if ($empleados->save()) {
			
			$destinoPath = public_path().'/production/images/empleados';
			$guardar = $file->move($destinoPath, $file->getClientOriginalName());
			Session::flash('message', 'Empleado creado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}
		

		return Redirect::to('empleados');
	}

	public function get($id)
	{
		$empleados = Empleado::where('id','=', $id)->get();
		$ciudades = Ciudad::all();
		$estados = Estado::all();
		return View::make('empleado.detalles', array('empleados' => $empleados,'ciudades' => $ciudades,'estados' => $estados));
	}


	public function getEdit($id)
	{
		$empleados = Empleado::where('id','=', $id)->get();
		$ciudades = Ciudad::all();
		$estados = Estado::all();
		return View::make('empleado.editar', array('empleados' => $empleados,'ciudades' => $ciudades,'estados' => $estados));
	}

	public function edit($id)
	{
		$empleados = Empleado::find($id);

		$empleados->identificacion = Input::get('identificacion');
		$empleados->ciudades_id = Input::get('ciudades_id');
		$empleados->nombre = Input::get('nombre');
		$empleados->apellido = Input::get('apellido');
		$empleados->fecha_ingreso = Input::get('fecha_ingreso');
		$empleados->telefono = Input::get('telefono');
		$empleados->celular = Input::get('celular');
		$empleados->direccion = Input::get('direccion');
		$empleados->correo = Input::get('correo');
		$empleados->user = Input::get('user');
		$empleados->password = Hash::make(Input::get('identificacion'));
		$empleados->estados_id = Input::get('estados_id');
		$file = Input::file('foto');
		$empleados->foto = $file->getClientOriginalName();

		if ($empleados->save()) {
			$destinoPath = public_path().'/production/images/empleados';
			$guardar = $file->move($destinoPath, $file->getClientOriginalName());
			Session::flash('message', 'Empleado Actualizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('empleados');
	}

	public function delete($id)
	{
		$empleados = Empleado::where('id','=', $id);

		if ($empleados->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('empleados');
	}

	public function inactivo($id)
	{
		$empleados = Empleado::find($id);

		$empleados->estados_id = 2;
		

		if ($empleados->save()) {
			Session::flash('message', 'Empleado Inactivo, correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('empleados');
	}

	public function activo($id)
	{
		$empleados = Empleado::find($id);

		$empleados->estados_id = 1;
		

		if ($empleados->save()) {
			Session::flash('message', 'Empleado Activo, correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('empleados');
	}

}