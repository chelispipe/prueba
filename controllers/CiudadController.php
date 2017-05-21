<?php 

class CiudadController extends BaseController
{
	public function index()
	{
		$ciudades = Ciudad::all();
		return View::make('ciudad.home',array('ciudades' => $ciudades));
	}

	public function create()
	{
		$ciudades = new Ciudad;

		$ciudades->nombre = Input::get('nombre');
		

		if ($ciudades->save()) {
			Session::flash('message', 'Ciudad creada correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('ciudades');
	}

	public function get($id)
	{
		$ciudades = Ciudad::where('id','=', $id)->get();

		return View::make('ciudad.home', array('ciudades' => $ciudades));
	}


	public function getEdit($id)
	{
		$ciudades = Ciudad::where('id','=', $id)->get();

		return View::make('ciudad.editar', array('ciudades' => $ciudades));
	}

	public function edit($id)
	{
		$ciudades = Ciudad::find($id);

		$ciudades->nombre = Input::get('nombre');
		

		if ($ciudades->save()) {
			Session::flash('message', 'Ciudad Actualizada correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('ciudades');
	}

	public function delete($id)
	{
		$ciudades = Ciudad::where('id','=', $id);

		if ($ciudades->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('ciudades');
	}
}