
        <?php
        echo "<br>whats going on<br>";
        //          phpinfo();
        $a = 5;
        echo gettype($a);
        $a = "pepe";
        echo "<br>" . gettype($a) . " soaijfoij";
        echo "<br>el valor de la variable es: $a";

        function contador() {
            static $i=0;
            $i++;
            echo "<br>".$i;
        }
        contador();
        
        echo "<br>";
        define ("pi", 3.1416, true);
        print "El valor de PI es ".pi;
        echo "<br>".date("D d M Y h:m:  s e");
        echo "<br>";
        echo time()+24*60;
        echo "<br>Hoy es: ".mktime(8,30,0,9,21,2024);
        echo date_default_timezone_set("America/Caracas"); 
        echo "<br>".date("D d M Y h:m:  s e");
              
?>
