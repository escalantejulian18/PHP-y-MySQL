<?php

class Equipo{
	
	public $idequipo; 
	public $descripcion;
	public $direccionIP; 
	public $direccionMAC;
	public $Empleado;

	public function setIdEquipo($idequipo)
	{
		$this->idequipo=$idequipo;
	}
	
	public function setDescripcion($descripcion)
	{
		$this->descripcion=$descripcion;
	}
	
	public function setIp($direccionIP)
	{
		$this->direccionIP=$direccionIP;
	}
	
	public function setMac($direccionMAC)
	{
		$this->direccionMAC=$direccionMAC;
	}
	
	public function setEmpleado($tipoempleado)
	{
		$this->Empleado=$tipoempleado;
	}
	
	public function getIdEquipo()
	{
		return $this->idequipo;
	}
	
	public function getDescripcion()
	{
		return $this->descripcion;
	}
	
	public function getIp()
	{
		return $this->direccionIP;
	}
	
	public function getMac()
	{
		return $this->direccionMAC;
	}
	public function getEmpleado()
	{
		return $this->Empleado;
	}
	
	public function insertar($equipo){ 
		
		$equipo= new Equipo();
		
		$idempleado=$this->Empleado;
		$descripcion=$this->descripcion;
		$ip=$this->direccionIP;
		$mac=$this->direccionMAC;
	
		$conector = new BaseDeDatos();
	
		$id=$conector->getUltimoIdInsertadio();
	
		$consulta ="INSERT INTO equipo(idequipo,idempleado, descripcion, ip, mac) 
					VALUES ($id,$idempleado, '$descripcion', '$ip', '$mac')";
	
		$conector->query($consulta);
	
	}
	
	
	public function getAll (){
	
	$conector = new BaseDeDatos();
	
	$consulta = "SELECT * FROM equipo";
		
	$result=$conector->query($consulta);
				
	
	$resultados = array();
	
	while ( ( $fila = $conector->fetchArray() ) != false ){
		
	$oEquipo = new Equipo();
        $oEquipo->setIdEquipo($fila['idequipo']);	
		$oEquipo->setDescripcion($fila['descripcion']);
		$oEquipo->setIp($fila['ip']);
		$oEquipo->setMac($fila['mac']);
		$oEquipo->setEmpleado($fila['idempleado']);
	
		$resultados[]=$oEquipo;
	}
	
	return $resultados;
	
	}
	
	public function eliminar($id){
	
	$conector = new BaseDeDatos();
	
	$consulta ="DELETE FROM equipo WHERE idequipo=$id";
	
	$conector->query($consulta);
	
	}
	
	
	public function modificar($equipo){ 
	
	$conector = new BaseDeDatos();
	
	$id=$this->getIdEquipo();
	$descripcion=$this->getDescripcion();
	$ip=$this->getIp();
	$mac=$this->getMac();
	$empleado=$this->getEmpleado();
	
		$consulta ="UPDATE `equipo` SET `idequipo`=$id,`idempleado`=$empleado,`descripcion`='$descripcion',`ip`='$ip',`mac`='$mac' WHERE idequipo=$id";
	
		$conector->query($consulta);
	
	}
	
	
	public function buscar($id){
	
	
	$conector = new BaseDeDatos();
	
		$consulta ="SELECT * FROM equipo WHERE idequipo = $id";
	
		$conector->query($consulta);
	
		$fila = $conector->fetchArray();
	
		$oEquipo = new Equipo();
		$oEquipo->setIdEquipo($fila['idequipo']);
		$oEquipo->setDescripcion($fila['descripcion']);
		$oEquipo->setIp($fila['ip']);
		$oEquipo->setMac($fila['mac']);
		$oEquipo->setEmpleado('idempleado');
	
		$resultados=$oEquipo;
	
			return $resultados;
	
	
		}
	
	
} 

?> 