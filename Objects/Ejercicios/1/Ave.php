<?php
require_once './Animal.php';
class Ave extends Animal {
    public $velocidad;
    
    public function __construct($n, $w, $c, $speed) {
        parent::__construct($n, $w, $c);
        $this->velocidad = $speed;
    }
    
    public function __toString(): string {
        return parent::__toString()." y puedo volar a ".$this->velocidad." km/segundo";
    }
}


?>