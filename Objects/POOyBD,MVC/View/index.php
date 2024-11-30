<?php
require_once '../Controller/productoController.php';
require_once '../Model/producto.php';


?>
<br>
<form action="" method="POST">
    Codigo: <input type="text" name="codigo"><br>
    Nombre: <input type="text" name="nombre"><br>
    Precio: <input type="text" name="precio"><br>
    Buscar por codigo:  <input type="text" name="codigo2"><br>
    <input type="submit" name="insertar" value="Insertar">
    <input type="submit" name="mostrar" value="Mostrar">
    <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST["insertar"])) {
    $p = new Producto($_POST["codigo"], $_POST["nombre"], $_POST["precio"]);
    if (ProductoController::insertar($p) ) {
        echo "se ha insertado correctamente";
    } else {
        "no se ha insertado correctamente";
    }
}
if (isset($_POST["mostrar"])) {
    if ($productos = ProductoController::getAll()) {
        foreach ($productos as $p) {
            //  echo $p->codigo . " - " . $p->nombre . " - " . $p->precio . "<br>";
            echo $p . "<br>";
        }
    } else {
        echo "errrrrrror";
    }
}
if (isset($_POST["buscar"])) {
    if ($p = ProductoController::find($_POST["codigo2"])) {

        echo $p;
    } else {
        echo "El producto no existe";
    }
}
?>