<?php

class Persona {

    public $nombre;
    public $apellido;
    public $edad;
    public static $numPerson = 0;

    public static function getNumPerson() {
        return self::$numPerson;
    }

    public function __clone(): void {
        self::$numPerson++;
        //    $this->edad=0;
    }

    public function __call(string $method, array $arguments): void {
        if ($method == "modificar") {
            if (count($arguments) == 1) {
                $this->nombre = $arguments[0];
            }
            if (count($arguments) == 2) {
                $this->nombre = $arguments[0];
                $this->apellido = $arguments[1];
            }
            if (count($arguments) == 3) {
                $this->nombre = $arguments[0];
                $this->apellido = $arguments[1];
                $this->edad = $arguments[2];
            }
        }
        if ($method == "modificar") {
            
        }
    }

    public function __destruct() {
        self::$numPerson--;
    }

    public static function eliminarPersona() {
        self::$numPerson--;
    }

    public function sumaEdad($n) {
        $this->edad += $n;
    }

    public function __construct($nom = "Antonio", $apell = "Rosa", $age = 43) {
        $this->nombre = $nom;
        $this->apellido = $apell;
        $this->edad = $age;
        self::$numPerson++;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "Soy " . $this->nombre . " " . $this->apellido . ", y tengo " . $this->edad . " años";
    }

//    NEVER AGAIN. USE MAGIC FUCKING FUNCTIONS.
//    public function getNombre() {
//        return $this->nombre;
//    }
//
//    public function getApellido() {
//        return $this->apellido;
//    }
//
//    public function getEdad() {
//        return $this->edad;
//    }
//
//    public function setNombre($nombre): void {
//        $this->nombre = $nombre;
//    }
//
//    public function setApellido($apellido): void {
//        $this->apellido = $apellido;
//    }
//
//    public function setEdad($edad): void {
//        $this->edad = $edad;
//    }
}

?>