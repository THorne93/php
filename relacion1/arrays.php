<?php

$a[8]="pepe";
echo $a[8];
$a[2]="Antonio";
echo $a[2];
$a[] = "Juan";
echo $a[9];
$a["edad"]=25;
$a[5] = "Rosa";


echo count($a);


$b=array("codigo"=>1,"nombre"=>2,"apell"=>"Lopez");
print_r($b);
echo "<br>";
var_dump($b);
echo "<br>";

foreach ($b as $value) {
    echo$value."<br>";
}
?>
