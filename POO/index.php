<?php
require_once './Producto.php';

//$p = new Producto("camisa01", "Camisa manga larga", 25);
//echo $p . "<br>";
//$p1 = new Producto();
//$p1->nuevoProducto("pantalon01", "Pantalón vaquero", 30);
//echo $p1 . "<br>";
?>
<br>
<form action="" method="POST">
    Codigo: <input type="text" name="codigo"><br>
    Nombre: <input type="text" name="nombre"><br>
    Precio: <input type="text" name="precio"><br>
    Buscar por codigo:  <input type="text" name="codigo"><br>
    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="mostrar" value="Mostrar">
    <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST["submit"])) {
    $p = new Producto($_POST["codigo"], $_POST["nombre"], $_POST["precio"]);
    if ($p->insertar()) {
        echo "se ha insertado correctamente";
    } else {
        "no se ha insertado correctamente";
    }
}
if (isset($_POST["mostrar"])) {
    if ($productos = Producto::getAll()) {
        foreach ($productos as $p) {
            //  echo $p->codigo . " - " . $p->nombre . " - " . $p->precio . "<br>";
            echo $p . "<br>";
        }
    } else {
        echo "errrrrrror";
    }
}
if (isset($_POST["buscar"])) {
    if ($p = Producto::find($_POST["codigo"])) {

        echo $p;
    } else {
        echo "El producto no existe";
    }
}
?>