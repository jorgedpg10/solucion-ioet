<?php

class Carga {

    public function importarInformacion() {

        $file = "./data.txt";
        $document = file_get_contents($file);

        $lines = explode("\n", $document);
    return $lines;
    }

}