<?php 

class TipoElementoController extends BaseController
{
	public function index()
	{
		$tipoElemento = TipoElemento::all();
		return View::make('tipo_elemento.home',array('tipoElemento' => $tipoElemento));
	}

	public function create()
	{
		$tipoElemento = new TipoElemento;

		$tipoElemento->descripcion = Input::get('descripcion');
		

		if ($tipoElemento->save()) {
			Session::flash('message', 'Tipo de Elemento creada correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('tipoElementos');
	}

	public function get($id)
	{
		$tipoElemento = TipoElemento::where('id','=', $id)->get();

		return View::make('tipo_elemento.home', array('tipoElemento' => $tipoElemento));
	}


	public function getEdit($id)
	{
		$tipoElemento = TipoElemento::where('id','=', $id)->get();

		return View::make('tipo_elemento.editar', array('tipoElemento' => $tipoElemento));
	}

	public function edit($id)
	{
		$tipoElemento = TipoElemento::find($id);

		$tipoElemento->descripcion = Input::get('descripcion');
		

		if ($tipoElemento->save()) {
			Session::flash('message', 'Tipo de Elemento Actualizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('tipoElementos');
	}

	public function delete($id)
	{
		$tipoElemento = TipoElemento::where('id','=', $id);

		if ($tipoElemento->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('tipoElementos');
	}
}