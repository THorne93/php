<?php

class Empleado {

    private $email;
    private $pass;
    private $nombre;
    private $salario;
    private $dep;

    public function __construct($e, $p, $n, $s, $d) {
        $this->email = $e;
        $this->pass = $p;
        $this->nombre = $n;
        $this->salario = $s;
        $this->dep = $d;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "email=".$this->email . ", pass=" . $this->pass . ", nombre=" . $this->nombre . ", salario=" . $this->salario . ", dep=" . $this->dep;
    }
}

?>