<?php

class WorkingDay {
    public $records = array();
    protected $name;

    /**
     * @return array
     */
    public function getRecords(): array {
        return $this->records;
    }

    /**
     * @param array $records
     */
    public function setRecords(array $records): void {
         $this->records = $records;
    }


    public function pushRecords( $rec){

        array_push($this->records, $rec);
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void {
        $this->name = $name;
    }


}