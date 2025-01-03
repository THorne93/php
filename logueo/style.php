<?php
if (isset($_SESSION["login"])) {
    ?>
    <style>
        p {
            color: black;
            display:inline;
        }
        html {
            top: 0;
            width: 100vw;
            height: 100%;
            color: <?php echo $_SESSION["usuario"]->color_letra ?>;

            background-color: <?php echo $_SESSION["usuario"]->color_fondo ?>;
            font-family :<?php echo $_SESSION["usuario"]->tipo_letra ?>;
            font-size: <?php echo $_SESSION["usuario"]->tam_letra ?>px;

        }

        legend {
            font-family : Arial, sans - serif;
            font-size: 1.3em;
            font-weight:bold;
            color:#333;
        }

        input[type = "text"], input[type = "password"] {
            font-family : Arial, Verdana, sans - serif;
            font-size: 0.8em;
            line-height:140%;
            color : #000;
            padding : 3px;
            border : 1px solid #999;
            height:18px;
            width:220px;
        }

        input[type = "submit"], input[type = 'button'] {
            width:160px;
            height:30px;
            padding-left:0px;
        }

        select {
            font-family : Arial, Verdana, sans - serif;
            font-size: 0.8em;
            line-height:140%;
            color : #000;
            padding : 3px;
            border : 1px solid #999;
            height:30px;
            width:220px;
        }

        a {
            font-family: Verdana, Arial, sans - serif;
            font-size: 0.7em;
        }

        div.campo {
            margin-top:8px;
            margin-bottom: 10px;
        }

        span.mensaje {
            font-family: Verdana, Arial, sans - serif;
            font-size: 0.7em;
            color: <?php echo $_SESSION["usuario"]->color_letra ?>;
            background-color : <?php echo $_SESSION["usuario"]->color_fondo ?>;
        }

        label.etiqueta {
            font-family : Arial, sans - serif;
            font-size:0.8em;
            font-weight: bold;
        }

        label.texto {
            font-family : Arial, Verdana, sans - serif;
            font-size: 1em;
            line-height:140%;
            color : #000;
        }


    </style>
    <?php
} else {
    ?>
    <style>
        fieldset {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 230px;
            margin-left: -115px;
            height: 300px;
            margin-top: -150px;
            padding:10px;
            border:1px solid #ccc;
            background-color: #eee;
        }

        legend {
            font-family : Arial, sans - serif;
            font-size: 1.3em;
            font-weight:bold;
            color:#333;
        }

        input[type = "text"], input[type = "password"] {
            font-family : Arial, Verdana, sans - serif;
            font-size: 0.8em;
            line-height:140%;
            color : #000;
            padding : 3px;
            border : 1px solid #999;
            height:18px;
            width:220px;
        }

        input[type = "submit"], input[type = 'button'] {
            width:160px;
            height:30px;
            padding-left:0px;
        }

        select {
            font-family : Arial, Verdana, sans - serif;
            font-size: 0.8em;
            line-height:140%;
            color : #000;
            padding : 3px;
            border : 1px solid #999;
            height:30px;
            width:220px;
        }

        a {
            font-family: Verdana, Arial, sans - serif;
            font-size: 0.7em;
        }

        div.campo {
            margin-top:8px;
            margin-bottom: 10px;
        }

        span.mensaje {
            font-family: Verdana, Arial, sans - serif;
            font-size: 0.7em;
            color: #009;
            background-color : #ffff00;
        }

        label.etiqueta {
            font-family : Arial, sans - serif;
            font-size:0.8em;
            font-weight: bold;
        }

        label.texto {
            font-family : Arial, Verdana, sans - serif;
            font-size: 1em;
            line-height:140%;
            color : #000;
        }
    </style>
    <?php
}
?>