<?php


class Cliente extends Eloquent {

	

	protected $table = 'clientes';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('identificacion','exp_ciudades_id','nombre','apellido','direccion','telefono','celular');

	public $timestamps = false;



	public function ciudad(){

		return $this->belongsTo('Ciudad','exp_ciudades_id');

	}

	public function elemento()
	{
		return $this->belongsToMany('Elemento', 'empeños', 'clientes_id', 'elementos_id');
	}

	
}