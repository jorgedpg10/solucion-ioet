<?php

require 'Carga.php';
require 'Controlador.php';


$carga = new Carga();
$jornadas = $carga->importarInformacion();

$controlador = new Controlador();
$response = $controlador->calcularJornada($jornadas);

foreach ($response as $res) {
    print_r("The amount to pay: " . $res['nombre'] . " is " . $res['total_jornada'] . " USD <br>");
}
