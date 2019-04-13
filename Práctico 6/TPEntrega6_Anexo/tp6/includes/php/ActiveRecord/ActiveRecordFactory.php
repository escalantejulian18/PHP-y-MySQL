<?php

namespace Sgu\ActiveRecord;

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/TipoDocumento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/TipoUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/Persona.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/Usuario.php';

/**
 * Clase encargada de crear los active record
 * 
 * @author totote
 * @package \Sgu\ActiveRecord
 */
abstract class ActiveRecordFactory
{
	public static function getTipoDocumento()
	{
		return new \Sgu\ActiveRecord\TipoDocumento();
	}
	
	public static function getTipoUsuario()
	{
		return new \Sgu\ActiveRecord\TipoUsuario();
	}
	
	public static function getPersona()
	{
		return new \Sgu\ActiveRecord\Persona();
	}
	
	public static function getUsuario()
	{
		return new \Sgu\ActiveRecord\Usuario();
	}
}