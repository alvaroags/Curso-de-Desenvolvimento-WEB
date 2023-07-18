<html>
    <head>
        <title>Concatenação</title>
    </head>
    <body>
        <?php
            $nome = "Álvaro";
            $cor = "azul";
            $idade = 19;
            $atividade_preferida = "jogar videogame";

            echo "Ola " . $nome . ", vi que sua cor preferida é " . $cor . ", estou vendo também que voce possui " . $idade . " anos e que gosta de " . $atividade_preferida;

            echo "<br/>";
            echo "<br/>";
            
            //Com aspas duplas pode ser feita a atribuição continua, sem precisar concatenar
            echo "Ola $nome, vi que sua cor preferida é $cor, estou vendo também que voce possui $idade anos e que gosta de $atividade_preferida";
        
        ?>
    </body>
</html>