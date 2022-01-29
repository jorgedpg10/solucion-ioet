<?php

class Registro {
    protected $dia;
    protected $hora_inicio;
    protected $hora_fin;

    public function __construct($day, $hora_ini, $hora_f){
        $this->dia = $day;
        $this->hora_inicio = $hora_ini;
        $this->hora_fin = $hora_f;
    }

}