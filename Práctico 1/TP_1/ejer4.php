<?php

function Calcular_Edad($fechanac, &$edad){

	$fechaact= array('dia'=>date('j'),
			'mes'=>date('n'),          //Fecha Actual
			'anio'=>date('Y'));


	if (($fechanac['mes'] == $fechaact['mes']) && ($fechanac['dia'] > $fechaact['dia'])) {
		$fechaact['anio']=($fechaact['anio']-1); }


		if ($fechanac['mes'] > $fechaact['mes']) {
			$fechaact['anio']=($fechaact['anio']-1);}


			$edad=($fechaact['anio']-$fechanac['anio']);

}

function aniobis($anio, &$b){

	switch ($anio){

		case ((fmod($anio, 4)==0) && (!(fmod($anio, 100)==0))):
			$b=true;//  ("Es Bisiesto");
			break;
		case ((fmod($anio, 100)==0) && (fmod($anio, 400)==0)):
			$b=true;// ("Es bisiesto");

		default:
			$b=false;//("No es Bisiesto");
	}

}

function fechavalida($fechanac2,&$b){
	
	if (strlen($fechanac2)==10){
		
		if (($fechanac2[2]=='/')&&($fechanac2[5]=='/')){
			$fecha =array (
					        'dia'=>$fechanac2[0].$fechanac2[1],
					        'mes'=>$fechanac2[3].$fechanac2[4],
					        'anio'=>$fechanac2[6].$fechanac2[7].$fechanac2[8].$fechanac2[9]
			);
			
			switch ($fecha['mes']){    //lugares que muestran el mes
				case '01':  //Enero
					if (($fecha['dia']=01 )&&($fecha['dia']<32)) {
						$b=true;
					}
				    break;
				case '02': //Febrero
					aniobis($fecha['anio'], $b);  // ¿Es bisiesto el año?
					if ($b==true){    // si, lo es
								if (($fecha['dia']>=01 )&&($fecha['dia']<29)) { 
								$b=true;
								}
					else {           // no, no lo es
						if (($fecha['dia']>=01 )&&($fecha['dia']<28)) {
						$b=true;
					}}			
					} // fin de ($b==true)
					break;
				case '03': //Marzo
					if (($fecha['dia']>=01 )&&($fecha['dia']<32)) {
						$b=true;
					}
				    break;
				case '04': //Abril
					if (($fecha['dia']>=01 )&&($fecha['dia']<31)) {
						$b=true;
					}
					break;
				case '05': //Mayo
					if (($fecha['dia']>=01 )&&($fecha['dia']<32)) {
						$b=true;
					}
					break;
				case '06': //Junio
					if (($fecha['dia']>=01 )&&($fecha['dia']<31)) {
						$b=true;
					}
					break;
				case '07':  //Julio
					if (($fecha['dia']>=01 )&&($fecha['dia']<32)) {
						$b=true;
					}
					break;
				case '08':   //Agosto
					if (($fecha['dia']>=01 )&&($fecha['dia']<32)) {
						$b=true;
					}
					break;
				case '09':  //Septiembre
					if (($fecha['dia']>=01 )&&($fecha['dia']<31)) {
						$b=true;
					}
					break;
				case '10':  //Octubre
					if (($fecha['dia']>=01 )&&($fecha['dia']<32)) {
						$b=true;
					}
					break;
				case '11':  //Noviembre
					if (($fecha['dia']>=01 )&&($fecha['dia']<31)) {
						$b=true;
					}
					break;
				case '12':  //Diciembre
					if (($fecha['dia']>=01 )&&($fecha['dia']<32)) {
						$b=true;
					}
					break;
				default:
					$b=false;
			}
					
				
			}
			else    // por si no tiene / en la posicion 2 y 5 dd/mm/aaaa
				$b=false;
		}
		else    //por si tiene mas de 10 caracteres
			$b=false;
	}

function info_perdonal($datos){
	

$fechanac2=$datos['fecha_nacimiento'];
//print ($fechanac2);

fechavalida($fechanac2, $b);     //evaluando si la fecha es valida

if (ereg(" ", $datos['nombre'])){
	$partes=explode(" ",$datos['nombre']);       // en caso de tener dos nombres pone la primeras letras en mayuscula de ambos nombres
	$datos['nombre']= trim(ucfirst(strtolower($partes[0]))).' '.trim(ucfirst(strtolower($partes[1]))); //vuelve a asignar la cadena corregida.
}
else {
	$datos['nombre']= trim(ucfirst(strtolower($datos['nombre']))); // en caso de tener solo un nombre
}

if ($b==true){
	

	$fechanac= array('dia'=>$fechanac2[0].$fechanac2[1],
		             'mes'=>$fechanac2[3].$fechanac2[4],
                     'anio'=>$fechanac2[6].$fechanac2[7].$fechanac2[8].$fechanac2[9]);		

	Calcular_Edad($fechanac, $edad);
	
	
	 
	 
	$oracion = trim(ucfirst(strtolower($datos['apellido']))).', '.$datos['nombre'].' de '.$edad.' anios de edad y documento '.strtoupper($datos['tipo_documento']).' '.$datos['numero_documento'].' nacido en la fecha '.$datos['fecha_nacimiento'];

	}
	
else{ 
	$datos['fecha_nacimiento']=' (Fecha no válida) ';
	$oracion = trim(ucfirst(strtolower($datos['apellido']))).', '.$datos['nombre'].' de -- anios de edad y documento '.strtoupper($datos['tipo_documento']).' '.$datos['numero_documento'].' nacido en la fecha '.$datos['fecha_nacimiento'];
}

print_r($oracion);
print ('<p>  </p>');

}



//            INICIO DEL PROGRAMA

$datos =array(
				0 => array('apellido' => 'Romero',
						   'nombre' => 'Fernando',
						   'tipo_documento' => 'dni',
						   'numero_documento' => '42601837',
						   'fecha_nacimiento' =>'13/08/2000'),
                1 => array('apellido' => 'Febre ', 
                		   'nombre' => 'Yolanda Rosa ',
                           'tipo_documento' => 'dni',
                           'numero_documento' =>'10587664',
                		   'fecha_nacimiento' => '15/01/1948'),
                2 => array('apellido' => 'Gomez', 
                	       'nombre' => 'IRMA',
                           'tipo_documento' => 'lc',
                           'numero_documento' => '5362812',
                           'fecha_nacimiento' => '22/05/1918'),
		        3 => array('apellido' => 'Lissa ', 
		       		       'nombre' => 'Romina ',
				           'tipo_documento' => 'dni',
				           'numero_documento' => '12385035',
				           'fecha_nacimiento' => '13/05/1958'),
			    4 => array('apellido' => 'Friz', 
			    		   'nombre' => 'Carlos Rolando',
						   'tipo_documento' => 'dni',
						   'numero_documento' => '14128874',
						   'fecha_nacimiento' => '01/05/1961'),
			    5 => array('apellido' => 'Garzia', 
			   		       'nombre' => 'Marta Camila',
						   'tipo_documento' => 'dni',
						   'numero_documento' => '17121841',
						   'fecha_nacimiento' => '23/11/1964'),
			    6 => array('apellido' => 'Soniez', 
			   		       'nombre' => 'Jorge Gonzalo',
						   'tipo_documento' => 'dni',
						   'numero_documento' => '13695121',
						   'fecha_nacimiento' => '09/08/1959'),
			    7 => array('apellido' => 'PEREZ', 
			   		       'nombre' => 'GISELA YANINA',
						   'tipo_documento' => 'dni',
						   'numero_documento' => '31486546',
						   'fecha_nacimiento' => '25/03/1985'),
			    8 => array('apellido' => 'YNZA', 
			   		       'nombre' => 'CARLA',
						   'tipo_documento' => 'dni',
						   'numero_documento' => '28302680',
						   'fecha_nacimiento' => '30/01/1981'),
			    9 => array('apellido' => 'Martinez', 
			   		       'nombre' => 'Antonia',
						   'tipo_documento' => 'dni',
						   'numero_documento' => '38054607',
						   'fecha_nacimiento' => '27/04/1994')
            );		

			  
for ($i=0; $i<=9; $i++){

	info_perdonal($datos[$i]);
}

?>