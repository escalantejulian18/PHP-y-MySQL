<?php

namespace Sgu\ActiveRecord;

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/Persona.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/TipoDocumento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/TipoUsuario.php';


abstract class ActiveRecordFactory{
	
		public static function getPersona(){
			
			return new \Sgu\ActiveRecord\Persona();
		}
		
		public static function getUsuario(){
			
			return new \Sgu\ActiveRecord\Usuario();
		}
		
		public static function getTipoDocumento(){
			
			return new \Sgu\ActiveRecord\TipoDocumento();
		}
		
		public static function getTipoUsuario(){
			
			return new \Sgu\ActiveRecord\TipoUsuario();
		}
		
		
	}