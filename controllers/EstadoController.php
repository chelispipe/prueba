<?php 

class EstadoController extends BaseController
{
	public function index()
	{
		$estados = Estado::all();
		return View::make('estado.home',array('estados' => $estados));
	}

	public function create()
	{
		$estados = new Estado;

		$estados->descripcion = Input::get('descripcion');
		

		if ($estados->save()) {
			Session::flash('message', 'estado creado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('estados');
	}

	public function get($id)
	{
		$estados = Estado::where('id','=', $id)->get();

		return View::make('estado.home', array('estados' => $estados));
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

	public function delete($id)
	{
		$estados = Estado::where('id','=', $id);

		if ($estados->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('estados');
	}
}