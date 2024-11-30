<?php

class Tarea {

    private $id;
    private $nombre;
    private $fechaIni;
    private $fechaFin;
    

    public function __construct($i='', $n, $fi, $ff) {
        $this->id = $i;
        $this->nombre = $n;
        $this->fechaIni = $fi;
        $this->fechaFin = $ff;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "id=".$this->id .", nombre=" . $this->nombre. ", fecha_ini=" . $this->fechaIni. ", fecha_fin=" . $this->fechaFin;
    }
}

?>