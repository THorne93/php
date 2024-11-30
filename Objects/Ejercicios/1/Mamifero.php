<?php

require_once './Animal.php';

class Mamifero extends Animal {

    public $manos;
    public $patas;
    public $swim;

    public function __construct($n, $w, $c, $man, $pat, $swim) {
        parent::__construct($n, $w, $c);
        $this->manos = $man;
        $this->patas = $pat;
        $this->swim = $swim;
    }

    public function __toString(): string {
        if ($this->manos == true) {
            if ($this->swim == true) {
                return parent::__toString() . ". Tengo manos y puedo nadar";
            } else {
                return parent::__toString() . ". Tengo manos y no puedo nadar";
            }
        } else if ($this->patas == true) {
            if ($this->swim == true) {
                return parent::__toString() . ". Tengo patas y puedo nadar";
            } else {
                return parent::__toString() . ". Tengo patas y no puedo nadar";
            }
        } else if ($this->swim == true) {
            return parent::__toString() . ". Puedo nadar";
        } else {
            return parent::__toString() . ". No puedo nadar";
        }
    }
}

?>