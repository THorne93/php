<?php



    $nombres = ["Ana", "Luis", "Carlos", "Maria"];

    $nombresReversed = array_reverse($nombres);

    printArray($nombresReversed);

    echo in_array("Carlos", $nombres);
    echo "<br>";
    array_push($nombres, "Juan");

    $nombresReversed = array_reverse($nombres);

    printArray($nombresReversed);

    function printArray($nombresReversed) {
    for ($i = 0; $i < sizeof($nombresReversed); $i++) {
        echo $nombresReversed[$i] . "<br>";
    }
    }

?>