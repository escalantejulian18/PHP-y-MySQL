<?php




function aniobis($anio, &$b){
	
	switch ($anio){
		
		case ((fmod($anio, 4)==0) && (!(fmod($anio, 100)==0))):
			$b=true;//  ("Es Bisiesto");
			break;
		case ((fmod($anio, 100)==0) && (fmod($anio, 400)==0)):
			$b=true;// ("Es bisiesto");

		default: 
			$b=false;("No es Bisiesto");	
	}
	
}

$anio=2016;

print ('<p> El anio ingresado es: '.$anio.'</p>');

print ('Resultado: ');
aniobis($anio,$b);

if ($b==true){
	echo "Es un Anio Bisiesto.";
}
else {
	echo "No es un Anio Bisiesto";
}

?> 