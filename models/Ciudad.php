<?php


class Ciudad extends Eloquent {

	

	protected $table = 'ciudades';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('nombre');

	public $timestamps = false;

}