<?php


class Empeno extends Eloquent {

	

	protected $table = 'empeños';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('num_empeño','clientes_id','elementos_id','valor','plazo_sacar','cant_pagos','faltan_pagos','empleados_id','fecha_ingreso','fecha_retiro','total_pagos','estados_id','observacion');

	public $timestamps = false;



	public function clientes(){

		return $this->belongsTo('Cliente','clientes_id');

	}

	public function elementos(){

		return $this->belongsTo('Elemento','elementos_id');

	}

	public function empleados(){

		return $this->belongsTo('Empleado','empleados_id');

	}

	public function estados(){

		return $this->belongsTo('Estado','estados_id');

	}

}