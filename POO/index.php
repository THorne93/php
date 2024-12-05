<?php
require_once './Producto.php';

//$p = new Producto("camisa01", "Camisa manga larga", 25);
//echo $p . "<br>";
//$p1 = new Producto();
//$p1->nuevoProducto("pantalon01", "Pantalón vaquero", 30);
//echo $p1 . "<br>";
?>
<br>
<form action="" method="POST" enctype="multipart/form-data">
    Codigo: <input type="text" name="codigo"><br>
    Nombre: <input type="text" name="nombre"><br>
    Precio: <input type="text" name="precio"><br>
    Imagen del producto:<input type="file" name="imagen"><br>
    Buscar por codigo:  <input type="text" name="codigo2"><br>
    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="mostrar" value="Mostrar">
    <input type="submit" name="buscar" value="Buscar">
</form>

<?php
//if (isset($_POST["submit"])) {
//    $p = new Producto($_POST["codigo"], $_POST["nombre"], $_POST["precio"]);
//    if ($p->insertar()) {
//        echo "se ha insertado correctamente";
//    } else {
//        "no se ha insertado correctamente";
//    }
//}
if (isset($_POST["submit"])) {
    echo "Nombre: " . $_FILES["imagen"]["name"] . "<br>";
    echo "Nombre temporal: " . $_FILES["imagen"]["tmp_name"] . "<br>";
    echo "Tamaño: " . $_FILES["imagen"]["size"] . "<br>";
    echo "Tipo: " . $_FILES["imagen"]["type"] . "<br>";
    echo "Error: " . $_FILES["imagen"]["error"] . "<br>";
    if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
        $fich = time() . "-" . $_FILES["imagen"]["name"];
        $ruta = "img/" . $fich;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "img/" . $fich);
        try {
            $conex = new mysqli("localhost", "dwes", "abc123.", "objetos_bd");
            $conex->query("insert into producto values ('$_POST[codigo]','$_POST[nombre]',$_POST[precio],'$ruta')");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}
//if (isset($_POST["mostrar"])) {
//    if ($productos = Producto::getAll()) {
//        foreach ($productos as $p) {
//            //  echo $p->codigo . " - " . $p->nombre . " - " . $p->precio . "<br>";
//            echo $p . "<br>";
//        }
//    } else {
//        echo "errrrrrror";
//    }
//}
if (isset($_POST["mostrar"])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "objetos_bd");
        $result = $conex->query("select * from producto");
        if ($result->num_rows) {
            while ($fila = $result->fetch_object()) {
                echo $fila->codigo . " - " . $fila->nombre . " - " . $fila->precio ."<br>";
                echo "<img width=250 height=250 src=$fila->imagen><br>";
            }
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
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