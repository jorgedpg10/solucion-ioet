<?php

use PHPUnit\Framework\TestCase;
require_once 'Carga.php';

class CargaTest extends TestCase
{
    /**
     * @test
     */
    public function test_it_stops_if_txt_is_empty(){
        $this->markTestSkipped( 'prueba no terminada');
        $carga = new Carga();
        $carga->importarInformacion("data.txt");
        $this->assertEquals(true, true);
    }

    //test_it_brings_data_correctly_into_array_jornada
    //test_it_show_correct_result_with_correct_information
}