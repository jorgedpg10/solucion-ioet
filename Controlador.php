<?php


class Controlador {


    public function calcularJornada($jornadas) {
        $response_data = [];

        foreach ($jornadas as $jornada) {

            $total_jornada = 0;
            foreach ($jornada->registros as $registro) {
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
                    die();
                }

                $horas = abs(strtotime($hora_inicio) - strtotime($registro->getHoraFin())) / 3600;

                if ($dia == 'MO' || $dia == 'TU' || $dia == 'WE' || $dia == 'TH' || $dia == 'FR') {
                    $valor = array(25, 15, 30);
                } else if ($dia == 'SA' || $dia == 'SU') {
                    $valor = array(30, 20, 25);
                } else {
                    print_r('\n Error en el formato del dìa \n');
                    die();

                }
                $precio_registro = $horas * $valor[$index];
                $total_jornada += $precio_registro;

            }

            array_push($response_data, array("nombre" => $jornada->nombre, "total_jornada" => $total_jornada));

        }
        $response = ['message' => 'success',
                'isSuccessful' => true,
                'data' => $response_data
        ];

        return $response;
    }

}