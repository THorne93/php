<?php

function getConnection($table) {
    $conex = new mysqli("localhost", "dwes", "abc123.", $table);
    $conex->set_charset("utf8mb4");
    return $conex;
}

function showPlayers($fila) {
    echo "Nombre: " . $fila->nombre . "<br>";
    echo "DNI: " . $fila->dni . "<br>";
    echo "Posiciones: " . $fila->posicion . "<br>";
    echo "Dorsal: " . $fila->dorsal . "<br>";
    echo "Equipo: " . $fila->equipo . "<br>";
    echo "Numero Goles: " . $fila->numGoles . "<br>";
    echo "--------------------------------------<br>";
}

function checkDNI($value) {
    if (preg_match('/\d{8}[A-Z]/', $value)) {
        return true;
    } else
        return false;
}

function checkNombre($value) {
    if (preg_match('/^[a-z]{1,32}$/i', $value)) {
        return true;
    } else {
        return false;
    }
}

function isEmpty($value) {
    if (empty($value)) {
        return true;
    } else {
        return false;
    }
}

function checkGoles($value) {
    if (is_numeric($value)) {
        return true;
    } else {
        return false;
    }
}

?>
