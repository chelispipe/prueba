<?php 

class MarcaController extends BaseController
{
	public function index()
	{
		$marcas = Marca::all();
		return View::make('marca.home',array('marcas' => $marcas));
	}

	public function create()
	{
		$marcas = new Marca;

		$marcas->descripcion = Input::get('descripcion');
		

		if ($marcas->save()) {
			Session::flash('message', 'Marca creada correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('marcas');
	}

	public function get($id)
	{
		$marcas = Marca::where('id','=', $id)->get();

		return View::make('marca.home', array('marcas' => $marcas));
	}


	public function getEdit($id)
	{
		$marcas = Marca::where('id','=', $id)->get();

		return View::make('marca.editar', array('marcas' => $marcas));
	}

	public function edit($id)
	{
		$marcas = Marca::find($id);

		$marcas->descripcion = Input::get('descripcion');
		

		if ($marcas->save()) {
			Session::flash('message', 'Marca Actualizada correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('marcas');
	}

	public function delete($id)
	{
		$marcas = Marca::where('id','=', $id);

		if ($marcas->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('marcas');
	}
}