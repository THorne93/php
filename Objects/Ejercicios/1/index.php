<?php

require_once './Animal.php';
require_once './Mamifero.php';
require_once './Perro.php';
require_once './Gato.php';
require_once './Ave.php';
require_once './Canario.php';

$a = new Animal("Iguana", "5kg", "Peru");
echo $a;
echo "<br>";
$m = new Mamifero("Perro", "10kg", "China", false, true, true);
echo $m;
echo "<br>";
$dog = new Perro("Milo", "15kg", "Alemania", false, true, false, 15);
echo $dog;
$dog->ladrar(7);
echo "<br>";
$cat = new Gato("Tiddles", "8kg", "Egypt", false, true, true);
echo $cat;
$cat->morir();

echo $cat;
echo "<br>";
$bird = new Ave("Tweety", "1kg", "Francia", 7);
echo $bird;
$a = [];
$canary1 = new Canario("Brian", "1kg", "España", 2);
$a[] = $canary1;
$canary1->fly();
echo "<br>" . $canary1;
$canary2 = new Canario("Brian", "1kg", "España", 2);
$a[] = $canary2;
echo  "<br>";
echo "Num de canarios: ".$canary1::getNumCanarios();
$a = $canary1->reproducir($a);
echo "<br>";
echo "Num de canarios: ".$canary1::getNumCanarios();

$a = $canary1->reproducir($a);
echo "<br>";
echo "Num de canarios: ".$canary1::getNumCanarios();

$a = $canary1->reproducir($a);
echo "<br>";
echo "Num de canarios: ".$canary1::getNumCanarios();

$a = $canary1->reproducir($a);

echo "<br>";
echo "Num de canarios: ".$canary1::getNumCanarios();

$a = $canary1->matarTodo($a);
echo "<br>";
echo "Num de canarios: ".$canary1::getNumCanarios();
?>

