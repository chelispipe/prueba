<?php


class Pago extends Eloquent {

	

	protected $table = 'pagos';
	
	 // protected $primaryKey = 'id_estado';
	
	protected $fillable = array('fecha','descripcion','empeños_id','valor');

	public $timestamps = false;

	public function empenos(){

		return $this->belongsTo('Empeno','empeños_id');

	}

	public function elementos()
	{
		return $this->belongsToMany('Elemento', 'empeños', 'clientes_id', 'elementos_id');
	}

}