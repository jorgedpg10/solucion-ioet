<?php
require 'src/Registro.php';

class Controlador {


    public function calcularJornada($lines) {
        $response = [];

        foreach ($lines as $line) {

            try {
                $separacion = explode("=", $line);
                $nombre = $separacion[0];
                $nombre = $this->correctName($nombre);
                $string_registros = $separacion[1];
                $registros = explode(",", $string_registros);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                exit(1);
            }


            foreach ($registros as $registro) {
                $object = new Registro();
                $object->setDia(substr($registro, 0, 2));
                $registro = substr($registro, 2, 12);
                $horas = explode("-", $registro);
                $object->setHoraInicio($horas[0]);
                $object->setHoraFin($horas[1]);
                $arreglo_registros[] = $object;
            }

            /* echo "<pre>";
             print_r($arreglo_registros);
             echo "</pre>";*/


            $total_jornada = 0;
            foreach ($arreglo_registros as $registro) {
                $dia = $registro->getDia();
                $hora_inicio = $registro->getHoraInicio();

                if (strtotime($hora_inicio) >= strtotime('00:00') && strtotime($hora_inicio) < strtotime('09:00')) {
                    $index = 0;
                } else if (strtotime($hora_inicio) >= strtotime('09:00') && strtotime($hora_inicio) < strtotime('18:00')) {
                    $index = 1;
                } else if (strtotime($hora_inicio) >= strtotime('18:00') && strtotime($hora_inicio) < strtotime('23:59')) {
                    $index = 2;
                } else {
                    print_r('Error en el formato de la hora');
                }

                $horas = abs(strtotime($hora_inicio) - strtotime($registro->getHoraFin())) / 3600;

                if ($dia == 'MO' || $dia == 'TU' || $dia == 'WE' || $dia == 'TH' || $dia == 'FR') {
                    $valor = array(25, 15, 30);
                } else if ($dia == 'SA' || $dia == 'SU') {
                    $valor = array(30, 20, 25);
                } else {
                    print_r('Error en el formato del DÍA \n');
                    // deberia botar un error aquì ?
                }

                $precio_registro = $horas * $valor[$index];
                $total_jornada += $precio_registro;
                //print_r($total_jornada. "<br>");

            }

            array_push($response, array("nombre" => $nombre, "total_jornada" => $total_jornada));
            unset($arreglo_registros);
        }
        return $response;
    }

    public function correctName($input){
        if ( gettype($input) != 'string' || $input == '' || $input == null){
            throw new Exception('Error, the name format is not correct');
        }

        return $input;
    }
}