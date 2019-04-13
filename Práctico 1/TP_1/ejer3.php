<?php

 
function Calcular_Edad($fechanaz, &$edad){

$fechaact= array('dia'=>date('j'),
		         'mes'=>date('n'),          //Fecha Actual
		         'ano'=>date('Y'));
 
 
 if (($fechanaz['mes'] == $fechaact['mes']) && ($fechanaz['dia'] > $fechaact['dia'])) {   
$fechaact['ano']=($fechaact['ano']-1); }
 
 
if ($fechanaz['mes'] > $fechaact['mes']) {
$fechaact['ano']=($fechaact['ano']-1);}
 

$edad=($fechaact['ano']-$fechanaz['ano']);
 
}

//               INICIO PROGRAMA



$fechanaz= array ('dia'=>18,         //fecha de nacimiento
		'mes'=>6,
		'ano'=>1993);


Calcular_Edad($fechanaz,$edad);

print ('Esta persona tiene ');
print ($edad);
print (' anios');

?>