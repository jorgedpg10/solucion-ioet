<?php

require 'Carga.php';
require 'Controlador.php';
$carga = new Carga();
$lines = $carga->importarInformacion();


$controlador = new Controlador();

$response = $controlador->calcularJornada($lines);

foreach ($response as $res) {
    print_r("The amount to pay: " . $res['nombre'] . " is " . $res['total_jornada'] . " USD <br>");
}
