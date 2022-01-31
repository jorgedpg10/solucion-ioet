<?php

require 'src/Registro.php';
require 'src/Jornada.php';


class Carga {

    public function importarInformacion() {

       $file = "data.txt";
        $document = file_get_contents($file);

        try {
            $document = $this->isString($document);

            $lines = explode("\n", $document);

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        foreach ($lines as $line) {

            try {
                $separacion = explode("=", $line);
                $nombre = $separacion[0];
                $nombre = $this->correctName($nombre);
                $string_registros = $separacion[1];
                $registros = explode(",", $string_registros);
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                exit(1);
            }

            foreach ($registros as $registro) {
                $reg = new Registro();
                $reg->setDia(substr($registro, 0, 2));
                $registro = substr($registro, 2, 12);
                $horas = explode("-", $registro);
                $reg->setHoraInicio($horas[0]);
                $reg->setHoraFin($horas[1]);
                $arreglo_registros[] = $reg;

                $jornada = new Jornada();
                $jornada->registros = $arreglo_registros;
                $jornada->nombre = $nombre;
            }
            $arreglo_registros = [];
            $jornadas[] = $jornada;

        }

        /*echo "<pre>";
        print_r($jornadas);
        echo "</pre>";*/

        return $jornadas;

    }


    function isString($input) {
        if (gettype($input) != 'string') {
            throw new Exception('Error, the format is not correct');
        }

        return $input;
    }

    public function correctName($input){
        if ( gettype($input) != 'string' || $input == '' || $input == null){
            throw new Exception('Error, the name format is not correct');
        }

        return $input;
    }

}