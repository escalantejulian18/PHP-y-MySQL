<?php

namespace Sgu\Singleton;

// Incluimos la clases necesarias
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Registry/Registry.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/Persona.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/Usuario.php';

/**
 * Clase que administra la sesión
 * 
 * @author totote
 * @package \Sgu\Singleton
 */
class Sesion
{
	private static $_instance;
	
	private function __construct()
	{
		session_start();
		
		if ( isset($_SESSION['registry']) == false || $_SESSION['registry'] == null )
		{
			$_SESSION['registry'] = new \Sgu\Registry\Registry();
		}
	}
	
	public static function getInstance()
	{
		if ( self::$_instance == null )
		{
			self::$_instance = new Sesion();
		}
		
		return self::$_instance;
	}
	
	/**
	 * 
	 * @return \Sgu\Registry\Registry
	 */
	public function getRegistry()
	{
		return $_SESSION['registry'];
	}
	
	public function destruir()
	{
		session_destroy();
	}
}