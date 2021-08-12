<?php

abstract class Indonesia {

    public function __construct($name){
        $this->_name = $name;
    }

    abstract public function policeCode() : string;
}

class Aceh extends Indonesia {
    public function policeCode() : string {
        return "Kode polisi $this->_name";
    }
}

$aceh = new Aceh("BA 1222 QW");
echo $aceh->policeCode();

?>