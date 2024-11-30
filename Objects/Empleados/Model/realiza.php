<?php

class Realiza {

    private $email;
    private $idTarea;
    private $horas;

    public function __construct($e, $i, $h) {
        $this->email = $e;
        $this->idTarea = $i;
        $this->horas = $h;
    }
    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "email=".$this->email . ", id_tarea=" . $this->idTarea. ", horas=" . $this->horas;
    }
}

?>