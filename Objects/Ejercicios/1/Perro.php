<?php

require_once './Mamifero.php';

class Perro extends Mamifero {

    public $edad;

    public function __construct($n, $w, $c, $man, $pat, $swim, $age) {
        parent::__construct($n, $w, $c, $man, $pat, $swim);
        $this->edad=$age;
    }
    public static function ladrar($count) {
        
        for ($index = 0; $index < $count; $index++) {
            echo "WOOF <br>";
        }
    }
}

?>