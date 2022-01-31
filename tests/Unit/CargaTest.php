<?php

use PHPUnit\Framework\TestCase;


class CargaTest extends TestCase
{
    /**
     * @test
     */
    public function test_it_stops_if_txt_is_empty(){
        $carga = new Carga();
        $carga_response = $carga->importarInformacion("data-vacio.txt");
        $this->assertEquals(false, $carga_response['isSuccessful']);
    }

    /**
     * @test
     */
    public function test_it_shows_error_message_if_name_format_is_not_correct(){

        $carga = new Carga();
        $carga_response = $carga->importarInformacion("data-nombre-incorrecto.txt");
        $this->assertEquals(false, $carga_response['isSuccessful']);
    }

    /**
     * @test
     */
    public function test_it_is_succesful_if_format_is_correct(){

        $carga = new Carga();
        $carga_response = $carga->importarInformacion("data.txt");
        $this->assertEquals(true, $carga_response['isSuccessful']);
        $this->assertNotEmpty($carga_response['data']);
    }

}