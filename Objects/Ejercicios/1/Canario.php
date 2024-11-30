<?php

require_once './Ave.php';

class Canario extends Ave {

    public static $numCanarios = 0;

    public function __construct($n = "Canario", $w = "0.5kg", $c = "España", $speed = "0.5") {
        parent::__construct($n, $w, $c, $speed);
        self::$numCanarios++;
    }

    public function __toString(): string {
        return parent::__toString();
    }

    public function reproducir($a) {
        if ($this->getNumCanarios() >= 2) {
            $total = $this->getNumCanarios() / 2;

            for ($index = 0;
                    $index < $total;
                    $index++) {
                $c = new Canario();
                $a[] = $c;
            }
        }
        return $a;
    }
    public function fly(){
        echo "<br><marquee direction='right' scrollamount='300 '><img height='40px' src='canary.jpg'></img></marquee>";
    }

    public function matarTodo($a) {
        foreach ($a as $value) {
            echo "<br><img height='40px' src='bang.png'</img>";
            self::$numCanarios -= 1;
        }
        unset($a);
    }

    public static function getNumCanarios() {
        return self::$numCanarios;
    }
}

?>