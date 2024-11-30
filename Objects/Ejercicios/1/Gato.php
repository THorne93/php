<?php

require_once './Mamifero.php';

class Gato extends Mamifero {
    public $vidas;
    
    
    public function __construct($n, $w, $c, $man, $pat, $swim, $lives = 7) {
        parent::__construct($n, $w, $c, $man, $pat, $swim);
        $this->vidas = $lives;
    }
    
    
    public function __toString(): string {
        return parent::__toString().". Tengo ".$this->vidas." vidas";
    }
    
    public function morir() {
        echo "<br><h4>$this->name: ME MUERO!!</h4><br>";
        $this->vidas -= 1;
    }
}
?>