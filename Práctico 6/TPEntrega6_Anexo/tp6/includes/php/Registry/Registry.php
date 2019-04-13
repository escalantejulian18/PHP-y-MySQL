<?php

namespace Sgu\Registry;

/**
 * Clase que administra la información de la sesión
 * 
 * @author totote
 * @package \Sgu\Registry
 */
class Registry
{
	private $_data = array();
	
	public function add($key, $data)
	{
		$this->_data[$key] = $data;
	}
	
	public function get($key)
	{
		return $this->_data[$key];
	}
	
	public function delete($key)
	{
		unset( $this->_data[$key] );
	}
	
	public function exists($key)
	{
		return isset( $this->_data[$key] );
	}
}