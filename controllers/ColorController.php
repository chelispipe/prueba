<?php 

class ColorController extends BaseController
{
	public function index()
	{
		$colores = Color::all();
		return View::make('color.home',array('colores' => $colores));
	}

	public function create()
	{
		$colores = new Color;

		$colores->descripcion = Input::get('descripcion');
		

		if ($colores->save()) {
			Session::flash('message', 'color creado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('colores');
	}

	public function get($id)
	{
		$colores = Color::where('id','=', $id)->get();

		return View::make('color.home', array('colores' => $colores));
	}


	public function getEdit($id)
	{
		$colores = Color::where('id','=', $id)->get();

		return View::make('color.editar', array('colores' => $colores));
	}

	public function edit($id)
	{
		$colores = Color::find($id);

		$colores->descripcion = Input::get('descripcion');
		

		if ($colores->save()) {
			Session::flash('message', 'Color Actualizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('colores');
	}

	public function delete($id)
	{
		$colores = Color::where('id','=', $id);

		if ($colores->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('colores');
	}
}