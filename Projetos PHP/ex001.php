<html>
    <head>
        <meta charset="utf-8">
        <title>Ex001</title>
    </head>
    <body>
        <?php
            $nome = 'Pedro Augusto';
            $idade = 67;
            $peso = 74;

            if(($idade>=19 && $idade<=69) && ($peso >= 50)){
                echo "$nome Doador";
            }
            else{
                echo "$nome Não doador";
            }
        ?>
    </body>
</html>