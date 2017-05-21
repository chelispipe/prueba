<?php


class TipoElemento extends Eloquent {

	

	protected $table = 'tipo_elementos';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('descripcion');

	public $timestamps = false;

}