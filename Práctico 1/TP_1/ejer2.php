<?php

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

function fecha($f,&$b){
	
	if (strlen($f)==10){
		
		if (($f[2]=='/')&&($f[5]=='/')){
			$fecha =array (
					        'dia'=>$f[0].$f[1],
					        'mes'=>$f[3].$f[4],
					        'anio'=>$f[6].$f[7].$f[8].$f[9]
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



//inicio



$f='29/02/2015';
$b=false;
//echo 'el tamanio de la cadena es:', (strlen($f));


fecha($f,$b);

if ($b==true){
	print( '<p> La fecha ingresada tiene formato correcto </p>');
}
else 
	print( '<p> La fecha ingresada tiene formato incorrecto </p>');



?>