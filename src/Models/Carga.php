<?php

require 'src/Models/Registro.php';
require 'src/Models/Jornada.php';


class Carga {

    public function importarInformacion($file) {

        $document = file_get_contents($file);
        $lines = explode("\n", $document);

        foreach ($lines as $line) {

            try {
                $separacion = explode("=", $line);
                $nombre = $separacion[0];
                $nombre = $this->correctName($nombre);
                $string_registros = $separacion[1];
                $registros = explode(",", $string_registros);
            } catch (Exception $e) {

                return $response = ['message' => 'Error, the name format is not correct',
                        'isSuccessful' => false,
                        'data' => []
                ];

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


        return $response = ['message' => 'success',
                'isSuccessful' => true,
                'data' => $jornadas
        ];

    }

    public function correctName($input) {
        if (gettype($input) != 'string' || $input == '' || $input == null) {
            throw new Exception('Error, the name format is not correct');
        }

        return $input;
    }

}