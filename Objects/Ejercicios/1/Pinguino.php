<?php

class Pinguino extends Ave {
    
    
    public function __construct($n, $w, $c, $speed) {
        parent::__construct($n, $w, $c, $speed);
    }
    
    public function __toString(): string {
        return parent::__toString();
    }
}

?>