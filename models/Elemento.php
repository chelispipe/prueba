<?php


class Elemento extends Eloquent {

	

	protected $table = 'elementos';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('descripcion','peso','tipo_elementos_id','colores_id','marcas_id','observacion','estado');

	public $timestamps = false;



	public function tipo(){

		return $this->belongsTo('TipoElemento','tipo_elementos_id');

	}

	public function color(){

		return $this->belongsTo('Color','colores_id');

	}

	public function marca(){

		return $this->belongsTo('Marca','marcas_id');

	}

	public function clientes()
	{
		return $this->belongsToMany('Cliente', 'empeños', 'elementos_id', 'clientes_id');
	}

}