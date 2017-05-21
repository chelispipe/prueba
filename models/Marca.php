<?php


class Marca extends Eloquent {

	

	protected $table = 'marcas';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('descripcion');

	public $timestamps = false;

}