<?php

function getConnection($table) {
    try {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
        $conex = new PDO('mysql:host=localhost;dbname=' . $table . ';charset=utf8mb4', 'dwes', 'abc123.', $opciones);
        return $conex;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
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
