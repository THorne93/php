<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
?>
<html>
    <head>
        <?php require_once './style.php'; ?>
        <title>title</title>
    </head>
    <body>   <form action="" method="POST"><input type="submit" name="salir" value="Salir"></form>    
        <?php echo"Hola " . $_SESSION["usuario"]->nombre . " " . $_SESSION["usuario"]->apellidos ?><br><br><br>
        <span><h1 class="mensaje">Tus datos son</h1></span><br>
        <?php
        foreach ($_SESSION["usuario"] as $key => $value) {
            if ($key != "pass") {
            echo $key . " - " . $value . "<br>";
            }
        }
        ?>
        <a href="inicio.php"><input type="button" value="Volver"></a><br>


    </body>
</html>

<?php
if (isset($_POST["salir"])) {
    session_destroy();
    header("location:index.php");
}
?>