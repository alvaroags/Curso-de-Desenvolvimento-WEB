<html>
    <head>
        <title>foreach</title>
    </head>
    <body>
        <?php
        $funcionarios = [
            ['Nome' => 'João', 'Salário' => 2500],
            ['Nome' => 'Maria', 'Salário' => 3000],
            ['Nome' => 'Julia', 'Salário' => 2000]
        ];
        foreach($funcionarios as $funcionario){
            foreach($funcionario as $i => $valor){
                echo "$i - $valor <br>";
            }
            echo "<hr>";
        }
        ?>
    </body>
</html>