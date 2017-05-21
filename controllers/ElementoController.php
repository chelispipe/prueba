<?php 

class ElementoController extends BaseController
{
	public function index()
	{
		$elementos = Elemento::all();
		$colores = Color::all();
		$tipo_elemento = TipoElemento::all();
		$marca = Marca::all();
		return View::make('elemento.home',array('elementos' => $elementos, 'colores' => $colores, 'tipo_elemento' => $tipo_elemento, 'marca' => $marca));
	}

	public function create()
	{
		$elementos = new Elemento;

		$elementos->descripcion = Input::get('descripcion');
		$elementos->peso = Input::get('peso');
		$elementos->tipo_elementos_id = Input::get('tipo_elementos_id');
		$elementos->colores_id = Input::get('colores_id');
		$elementos->marcas_id = Input::get('marcas_id');
		$elementos->observacion = Input::get('observacion');
		$elementos->estado = 'Disponible';
		
		

		if ($elementos->save()) {
			Session::flash('message', 'Elemento creado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('elementos');
	}

	public function get($id)
	{
		$elementos = Elemento::where('id','=', $id)->get();
		$colores = Color::all();
		$tipo_elemento = TipoElemento::all();
		$marca = Marca::all();
		$empeno = Empeno::where('elementos_id','=',$id)->get();
		$ciudades = Ciudad::all();

		if($empeno->count() == 0){
			Session::flash('message', 'El Elemento esta disponible o no se encuentra empeñado!');
			Session::flash('class', 'danger');
			return Redirect::to('elementos');
		}else{
			foreach ($empeno as $dato) {
			 	$cliente = DB::table('clientes')
			 						->join('empeños', 'clientes.id', '=', 'empeños.clientes_id')
			 						->join('elementos', 'empeños.elementos_id', '=', 'elementos.id')
									->where('elementos.id', '=', $dato->elementos->id)
									->get();
			}

			return View::make('elemento.detalles', array('elementos' => $elementos, 'colores' => $colores, 'tipo_elemento' => $tipo_elemento, 'marca' => $marca,'dato'=> $cliente, 'ciudad' => $ciudades,'empeno' => $dato));
		}

		
	}


	public function getEdit($id)
	{
		$elementos = Elemento::where('id','=', $id)->get();
		$colores = Color::all();
		$tipo_elemento = TipoElemento::all();
		$marca = Marca::all();
		return View::make('elemento.editar', array('elementos' => $elementos, 'colores' => $colores, 'tipo_elemento' => $tipo_elemento, 'marca' => $marca));
	}

	public function edit($id)
	{
		$elementos = Elemento::find($id);

		$elementos->descripcion = Input::get('descripcion');
		$elementos->peso = Input::get('peso');
		$elementos->tipo_elementos_id = Input::get('tipo_elementos_id');
		$elementos->colores_id = Input::get('colores_id');
		$elementos->marcas_id = Input::get('marcas_id');
		$elementos->observacion = Input::get('observacion');
		$elementos->estado = Input::get('estado');
		

		if ($elementos->save()) {
			Session::flash('message', 'Elemento Actualizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('elementos');
	}

	public function delete($id)
	{
		$elementos = Elemento::where('id','=', $id);

		if ($elementos->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('elementos');
	}
}