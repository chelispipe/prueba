<?php 

class ClienteController extends BaseController
{
	public function index()
	{
		$clientes = Cliente::all();
		$ciudades = Ciudad::all();
		return View::make('cliente.home',array('clientes' => $clientes, 'ciudades' => $ciudades));
	}

	public function create()
	{
		$clientes = new Cliente;

		$clientes->identificacion = Input::get('identificacion');
		$clientes->exp_ciudades_id = Input::get('exp_ciudades_id');
		$clientes->nombre = Input::get('nombre');
		$clientes->apellido = Input::get('apellido');
		$clientes->direccion = Input::get('direccion');
		$clientes->telefono = Input::get('telefono');
		$clientes->celular = Input::get('celular');
		

		if ($clientes->save()) {
			Session::flash('message', 'Cliente creado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('clientes');
	}

	public function get($id)
	{
		$clientes = Cliente::where('id','=', $id)->get();
		$empeno = Empeno::where('clientes_id','=', $id)->get();
		// $pagos = Pago::all();
		if($empeno->count() == 0){
			//pendiente por modificar
		}else{
			foreach ($empeno as $dato) {
			 	$pagos = DB::table('pagos')
			 						->join('empeños', 'pagos.empeños_id', '=', 'empeños.id')
			 						->join('clientes', 'empeños.clientes_id', '=', 'clientes.id')
			 						->join('elementos', 'empeños.elementos_id', '=', 'elementos.id')
									->where('clientes.id', '=', $dato->clientes->id)
									->get();
			}

		return View::make('cliente.detalles', array('clientes' => $clientes, 'pago' => $pagos, 'empenos' => $dato));
		}
	}


	public function getEdit($id)
	{
		$clientes = Cliente::where('id','=', $id)->get();
		$ciudades = Ciudad::all();
		return View::make('cliente.editar', array('clientes' => $clientes,'ciudades' => $ciudades));
	}

	public function edit($id)
	{
		$clientes = Cliente::find($id);

		$clientes->identificacion = Input::get('identificacion');
		$clientes->exp_ciudades_id = Input::get('exp_ciudades_id');
		$clientes->nombre = Input::get('nombre');
		$clientes->apellido = Input::get('apellido');
		$clientes->direccion = Input::get('direccion');
		$clientes->telefono = Input::get('telefono');
		$clientes->celular = Input::get('celular');
		

		if ($clientes->save()) {
			Session::flash('message', 'Cliente Actualizado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('clientes');
	}

	public function delete($id)
	{
		$clientes = Cliente::where('id','=', $id);

		if ($clientes->delete()) {
			Session::flash('message', 'Registro eliminado correctamente!');
			Session::flash('class', 'success');
		}else{
			Session::flash('message', 'Ocurrio un error!');
			Session::flash('class', 'danger');
		}

		return Redirect::to('clientes');
	}
}