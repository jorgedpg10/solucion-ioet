<?php

require 'src/Models/Carga.php';
require 'src/Controlador.php';
require 'env.php';

$carga = new Carga();
$carga_response = $carga->importarInformacion($file);

if ($carga_response['isSuccessful']) {
    $jornadas = $carga_response['data'];
}else{
    print_r( $carga_response['message']);
    die();
}

$controlador = new Controlador();
$response = $controlador->calcularJornada($jornadas);


if ($response['isSuccessful']) {
    foreach ($response['data'] as $data) {
        print_r("The amount to pay: " . $data['nombre'] . " is " . $data['total_jornada'] . " USD <br>");
    }
}else{
    print_r( $response['message']);
}
