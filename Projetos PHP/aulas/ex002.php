<html>
    <head>
        <title>Ex002</title>
    </head>
    <body>
        <?php
            $salario = 5000.00;
            function valorImposto($salario)
            {
                if ($salario < 1900)
                    $imposto = 0.00;
                else if ($salario < 2800)
                    $imposto = $salario * 0.075;
                else if ($salario < 3750)
                    $imposto = $salario * 0.15;
                else if ($salario < 4664)
                    $imposto = $salario * 0.225;
                else
                    $imposto = $salario * 0.275;
                return $imposto;
            }
            echo valorImposto($salario);
        ?>
    </body>
</html>