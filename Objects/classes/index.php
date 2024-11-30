<?php

require_once './persona.php';
require_once './empleado.php';

$p = new Persona("Brian", "Fantana", 69);

$p->nombre = ("Pepe");
echo $p->nombre . " " . $p->apellido . " " . $p->edad . "<br>";
$p->nombre = "Brian";
echo $p->nombre . " " . $p->apellido . " " . $p->edad . "<br>";
echo $p;
echo "<br>" . Persona::getNumPerson();
$p2 = new Persona("Ryan", "Fantana", 69);
echo "<br>" . Persona::getNumPerson();
$p3 = new Persona("Bob", "Fantana", 69);
unset($p3);
echo "<br>" . Persona::getNumPerson();
Persona::eliminarPersona();
echo "<br>" . Persona::getNumPerson();
//modificaEdad($p);
echo "<br>" . $p;

echo $p;
$p->sumaEdad(5) . "<br>";
$p_encode = json_encode($p);
echo "<br>";
var_dump($p_encode);

echo "<br>";
var_dump($p);

$p_decode = json_decode($p_encode);
echo "<br>";
var_dump($p_decode);
$newp = New Persona($p_decode->nombre, $p_decode->apellido, $p_decode->edad);
echo "<br>";

echo $newp;
echo "<br>";
echo "------------------------------COPIAR OBJECTOS------------------------------------";
$p4 = clone ($p);

echo "<br>";
echo "soy p " . $p;
echo "<br>";
echo "soy p4 " . $p4;
// $p4->nombre = "Jorge";
echo "<br>";
echo "soy p4 " . $p4;
echo "<br>";
echo "soy p " . $p;

echo "<br>";
if ($p == $p4) {
    echo "son iguales";
} else {
    echo "son diferentes";
}
$p5 = $p4;
$p5->edad = 30;
echo "<br>";
if ($p5 == $p4) {
    echo "son iguales";
} else {
    echo "son diferentes";
}
$p4->modificar("Manolo");
echo $p4;
$p4->modificar("George","Jungle",499);
echo $p4;
echo "<br>";

echo "------------------------------INHERITANCE------------------------------------";

echo "<br>";


$e = new Empleado("Paco","Morcilla",7,51000);
// echo $e." y gano ".$e->salario;

echo $e;






function modificaEdad(Persona $persona) {
    $persona->edad = 100;
}

?>