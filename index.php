<?php

require 'Carga.php';
require 'src/Registro.php';

 $carga = new Carga();
 $lines =  $carga->importarInformacion();

//echo $lines[0];
//JORGE=MO10:00-12:00,TU10:00-12:00,TH01:00-03:00,SA14:00-18:00,SU20:00-21:00

$separacion = explode("=", $lines[0]);
$nombre = $separacion[0];

echo "el nombre es: ".$nombre."<br>";
$string_registros = $separacion[1];
$registros = explode(",", $string_registros);

/*echo $registros[0]."<br>"; // MO10:00-12:00
echo $registros[1]."<br>"; // TU10:00-12:00

foreach ($registros as $registro){
    echo $registro."<br>";
}*/


$object = new Registro('Mo', '14:00', '16:00');
$myArray[] = $object;

$object = new Registro('TU', '07:00', '09:00');
$myArray[] = $object;

echo "<pre>";
var_dump( $myArray );
echo "</pre>";


// foreach()
//arreglo de registros
