<?php

require 'Carga.php';
require 'Controlador.php';
require 'env.php';

$carga = new Carga();
$jornadas = $carga->importarInformacion($file);

$controlador = new Controlador();
$response = $controlador->calcularJornada($jornadas);


if ($response['isSuccessful']) {
    foreach ($response['data'] as $data) {
        print_r("The amount to pay: " . $data['nombre'] . " is " . $data['total_jornada'] . " USD <br>");
    }
}else{
    print_r( $response['message']);
}
