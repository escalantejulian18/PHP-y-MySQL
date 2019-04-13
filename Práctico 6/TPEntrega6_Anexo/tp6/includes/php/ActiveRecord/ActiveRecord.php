<?php

namespace Sgu\ActiveRecord;

// Incluimos la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/BaseDeDatos.php';

/**
 * Clase abstracta base para los modelos de ActiveRecord
 * 
 * @author totote
 * @package \Sgu\ActiveRecord
 */
abstract class ActiveRecord
{
	protected $_conexion;
	
	public function __construct()
	{
		$this->_conexion = \Sgu\Singleton\BaseDeDatos::getInstance()->getConexion();
	}
	
	abstract public function insert();
	abstract public function update($id);
	abstract public function delete($id);
	abstract public function fetch($id);
}