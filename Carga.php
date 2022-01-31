<?php

class Carga {

    public function importarInformacion() {

        $file = "./data.txt";
        $document = file_get_contents($file);

        try {
            $document = $this->isString($document);

            $lines = explode("\n", $document);
            return $lines;

        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }


    function isString( $input ){
        if( gettype($input) != 'string'){
            throw new Exception('Error, the format is not correct');
        }

        return $input;
    }

}