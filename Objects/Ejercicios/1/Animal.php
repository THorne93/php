<?php

class Animal {

    public $name;
    public $weight;
    public $country;

    public function __construct($n, $w, $c) {
        $this->name = $n;
        $this->weight = $w;
        $this->country = $c;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "Soy un ".get_class($this).".     Soy " . $this->name . ", peso " . $this->weight . " kilos, soy de " . $this->country;
    }
}

?>
