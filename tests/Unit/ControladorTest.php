<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Models/Carga.php';
require_once 'src/Controlador.php';
require_once 'src/Models/Jornada.php';
require_once 'src/Models/Registro.php';


class ControladorTest extends TestCase
{
    /**
     * @test
     */
    public function test_it_responds_with_success_when_format_is_correct(){

        $carga = new Carga();
        $carga_response = $carga->importarInformacion("data.txt");

        $controlador = new Controlador();
        $response = $controlador->calcularJornada($carga_response['data']);

        $this->assertEquals(true, $response['isSuccessful']);

    }

    /**
     * @test
     */
    public function test_it_responds_with_false_status_when_time_format_is_incorrect(){
        $registro = new Registro();
        $registro->setDia('MO');
        $registro->setHoraInicio('0'); //Incorrect format
        $registro->setHoraFin('10:00');
        $jornada = new Jornada();
        $arreglo_registros[] = $registro;

        $jornada->registros = $arreglo_registros;
        $jornada->nombre = 'JORGE';

        $jornadas[] = $jornada;

        $controlador = new Controlador();
        $response = $controlador->calcularJornada($jornadas);

        $this->assertEquals(false, $response['isSuccessful']);
        $this->assertEquals('Error. Time format is not correct', $response['message']);
    }

    /**
     * @test
     */
    public function test_it_responds_with_false_status_when_day_format_is_incorrect(){
        $registro = new Registro();
        $registro->setDia(''); // Incorrect day format
        $registro->setHoraInicio('09:00');
        $registro->setHoraFin('10:00');
        $jornada = new Jornada();
        $arreglo_registros[] = $registro;

        $jornada->registros = $arreglo_registros;
        $jornada->nombre = 'JORGE';

        $jornadas[] = $jornada;

        $controlador = new Controlador();
        $response = $controlador->calcularJornada($jornadas);

        $this->assertEquals(false, $response['isSuccessful']);
        $this->assertEquals('Error. Day format is not correct', $response['message']);
    }

}