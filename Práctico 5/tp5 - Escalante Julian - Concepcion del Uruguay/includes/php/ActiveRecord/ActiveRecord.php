<?php

namespace  Sgu\ActiveRecord;

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/BaseDeDatos.php';

abstract class ActiveRecord{
	
	protected $_conexion;
	
	public function __construct()
	{
		$this->_conexion = \Sgu\Singleton\BaseDeDatos::getInstance()->getConexion();
	}
	
	public abstract function insert();
	
	public abstract function update($id);
	
	public abstract function delete($id);
	 
	public abstract function fetch($id);	
}