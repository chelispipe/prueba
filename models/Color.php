<?php


class Color extends Eloquent {

	

	protected $table = 'colores';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('descripcion');

	public $timestamps = false;

}