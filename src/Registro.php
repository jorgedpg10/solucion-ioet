<?php

class Registro {
    protected $dia;
    protected $hora_inicio;
    protected $hora_fin;

    /**
     * @return mixed
     */
    public function getDia() {
        return $this->dia;
    }

    /**
     * @param mixed $dia
     */
    public function setDia($dia): void {
        $this->dia = $dia;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio() {
        return $this->hora_inicio;
    }

    /**
     * @param mixed $hora_inicio
     */
    public function setHoraInicio($hora_inicio): void {
        $this->hora_inicio = $hora_inicio;
    }

    /**
     * @return mixed
     */
    public function getHoraFin() {
        return $this->hora_fin;
    }

    /**
     * @param mixed $hora_fin
     */
    public function setHoraFin($hora_fin): void {
        $this->hora_fin = $hora_fin;
    }

    public function __construct(){

    }

}