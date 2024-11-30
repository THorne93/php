<?php

require_once './persona.php';

class Empleado extends Persona {

    public $salario;

    public function __construct($nom = "Antonio", $apell = "Rosa", $age = 43, $sal = 1000) {
        parent::__construct($nom, $apell, $age);
        $this->salario = $sal;
    }
//
//    public function __get(string $name): mixed {
//        return $this->$name;
//    }
//
//    public function __set(string $name, mixed $value): void {
//        $this->$name = $value;
//    }
    
    public function __toString(): string {
        return parent::__toString()." y gano ".$this->salario;
    }
}

?>
