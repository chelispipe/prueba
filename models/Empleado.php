<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Empleado extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	protected $table = 'empleados';
	
	// protected $primaryKey = 'id';
	
	protected $fillable = array('identificacion','ciudades_id','nombre','apellido','fecha_ingreso','telefono','celular','direccion','correo','user','password','estados_id','foto');

	public $timestamps = false;



	public function ciudad(){

		return $this->belongsTo('Ciudad','ciudades_id');

	}

	public function estado(){

		return $this->belongsTo('Estado','estados_id');

	}

}