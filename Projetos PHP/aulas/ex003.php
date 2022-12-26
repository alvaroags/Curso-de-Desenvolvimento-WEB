<html>
    <head>
        <title>Ex003</title>
    </head>
    <body>
        <?php
            $lista = [];
            while(count($lista) < 6){
                $var = rand(1,60);
                if (!in_array($var, $lista))
                    $lista[] = $var;
            }
            for ($i = 0; $i < 6; $i++)
                echo $lista[$i] . "<br>";
        ?>
    </body>
</html>