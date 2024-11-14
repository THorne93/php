<?php

try {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
    $conex = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
    $conex->beginTransaction();
    $registro = $conex->exec("UPDATE stock set unidades = 100 WHERE producto='3DSNG'");
    $reg2 = $conex->exec("UPDATE stock set unidades = 10 WHERE producto='ACERAX3950'");
    $conex->commit();
    if ($registro && $reg2) {
        echo "Registro actualizado correctamente-" . $registro . "--" . $reg2;
    } elseif ($registro === 0) {
        echo "no se ha realizado la actualizacion porque no se encuentra";
    } else {
        echo "error al realizar la actualizacion";
    }
} catch (PDOException $ex) {
    $conex->rollBack();
    echo $ex->getmessage();
}



//CONSULTA7
try {
    $result = $conex->query("SELECT * FROM producto");
    echo "<br><br>Número de regustros devueltos: " . $result->rowCount() . "<br>";
    while ($fila = $result->fetch()) {
        echo "Nombre: " . $fila->nombre_corto . "<br>";
    }
} catch (PDOException $ex) {
    echo $ex->getmessage();
}
echo "<br><br>";
$menor = 100;
$mayor = 200;
try {
    for ($i = 0; $i < 1000; $i += 100) {
        $j=$i+100;
        //$result = $conex->prepare("SELECT * FROM producto where PVP>? AND PVP<?");
        //$result->bindParam(1, $menor);
        //$result->bindParam(2, $mayor);
        //
        // with names works like this =>>
        $result = $conex->prepare("SELECT * FROM producto where PVP> :pvp1 AND PVP< :pvp2");
        // $result->bindParam(":pvp1", $menor);
        //$result->bindParam(":pvp2", $mayor);
        //$result->execute();
       // $result->execute(array(":pvp1" => $menor, ":pvp2" => $mayor));
        $result->execute(array(":pvp1" => $i, ":pvp2" => $j));
        //echo $result;
        echo "<br>PRODUCTOS ENTRE €".$i." y €".$j." (".$result->rowCount().")<br>";
        while ($fila = $result->fetchObject()) {
            echo "Nombre: " . $fila->nombre_corto . "<br>";
        }
    }
} catch (PDOException $ex) {
    echo $ex->getmessage();
}
?>