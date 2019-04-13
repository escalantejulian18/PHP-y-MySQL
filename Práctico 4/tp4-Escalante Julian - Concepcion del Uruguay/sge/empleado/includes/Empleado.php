<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';
 

class Empleado{
	
	public  $idempleado;
	public  $apellido;
	public  $nombre;
	public  $legajo;
	
	public function setIdEmpleado($idempleado)
	{
		$this->idempleado=$idempleado;
	}
	
	public function setApellido($apellido)
	{
		$this->apellido=$apellido;
	}
	
	public function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}
	
	public function setLegajo($legajo)
	{
		$this->legajo=$legajo;
	}
	
	public function getIdEmpleado()
	{
		return $this->idempleado;
	}
	
	public function getApellido()
	{
		return $this->apellido;
	}
	
	public function getNombre()
	{
		return $this->nombre;
	}
	
	public function getLegajo()
	{
		return $this->legajo;
	}
	
	
	
	
	public function insertar($empleado){ //entro con el objeto empleado

		$apellido = $this->apellido;
		$nombre = $this->nombre;
		$legajo = $this->legajo;
		
		$conector = new BaseDeDatos();
	
		$id=$conector->getUltimoIdInsertadio();
	
		$consulta ="INSERT INTO `empleado`(`idempleado`, `apellido`, `nombre`, `legajo`) 
			     VALUES ($id,'$apellido','$nombre',$legajo)";
	
		$conector->query($consulta);
		
	}
	
	
	public function getAll (){
		
		$conector = new BaseDeDatos();
		
		$consulta = "SELECT * FROM empleado";
			
		$result=$conector->query($consulta);
			
		//$fila = $conector->fetchArray();
		
		$resultados = array();
		
		while ( ( $fila = $conector->fetchArray() ) != false ){
			
			$oEmpleado = new Empleado();
			$oEmpleado->setIdEmpleado($fila['idempleado']);
			$oEmpleado->setApellido($fila['apellido']);
			$oEmpleado->setNombre($fila['nombre']);
			$oEmpleado->setLegajo($fila['legajo']);
		
			$resultados[]=$oEmpleado;
		}
		
		return $resultados;
		
	}
	
	public function eliminar($id){ 
	
		$conector = new BaseDeDatos();
	
		$consulta ="DELETE FROM empleado WHERE idempleado=$id";
	
		$conector->query($consulta);
	
	}
	
	
	public function modificar($empleado){ //entro con el objeto empleado
	
		$conector = new BaseDeDatos();
		
		$id=$empleado->getIdEmpleado();
		$nombre=$empleado->getApellido();
		$apellido=$empleado->getNombre();
		$legajo=$empleado->getLegajo();
	
		$consulta ="UPDATE empleado SET apellido='$apellido',nombre='$nombre',legajo=$legajo WHERE idempleado=$id";
	
		$conector->query($consulta);
		
	}
	
	
	public function buscar($id){ 
	
	
		$conector = new BaseDeDatos();
	
		$consulta ="SELECT * FROM empleado WHERE idempleado = $id";
	
		$conector->query($consulta);
		
		$fila = $conector->fetchArray();
		
		$oEmpleado = new Empleado();
		$oEmpleado->setIdEmpleado($fila['idempleado']);
		$oEmpleado->setApellido($fila['apellido']);
		$oEmpleado->setNombre($fila['nombre']);
		$oEmpleado->setLegajo($fila['legajo']);
		
		$resultados=$oEmpleado;
		
		return $resultados;
		
		
	}
	
	
	
	
}