<?php
session_start();
?>
<html>
    <head>
        <?php require_once './style.php'; ?>
        <title>title</title>
    </head>
    <body>   <form action="" method="POST"><input type="submit" name="salir" value="Salir"></form>    
            <?php echo"Hola ".$_SESSION["usuario"]->nombre." ".$_SESSION["usuario"]->apellidos ?><br><br><br>
            <span><h1 class="mensaje">Bienvenido a nuestra web</h1></span><br>
            <a href="datos.php"><input type="button" value="Ver mis datos"></a><br>
            <a href="modificar.php"><input type="button" value="Modificar datos"></a>

    </body>
</html>

<?php 
if (isset($_POST["salir"])) {
    session_destroy();
    header("location:index.php");
}
?>