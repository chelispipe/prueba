<?php


class Estado extends Eloquent {

	

	protected $table = 'estados';
	
	 // protected $primaryKey = 'id_estado';
	
	protected $fillable = array('descripcion');

	public $timestamps = false;

}