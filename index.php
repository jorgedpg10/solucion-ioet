<?php

require_once 'Carga.php';
require_once 'src/Record.php';
require_once 'src/WorkingDay.php';
require_once 'Controlador.php';

$carga = new Carga();
$lines = $carga->importarInformacion();


$controlador = new Controlador();

$response = $controlador->calcularJornada($lines);

foreach ($response as $res) {
    print_r("The amount to pay: " . $res['nombre'] . " is " . $res['total_jornada'] . " USD <br>");
}
