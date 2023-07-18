<html>
    <head>
        <title>Pesquisa em arrays</title>
    </head>
    <body>
        <?php 
            //in_array() -> true ou false
            //array_search() -> retorna o indice do valor pesquisado
        $lista = ['uva', 'pera', 'morango'];

        if (in_array("uva", $lista))
            echo 'Sim, existe o valor pesquisado';
        else
            echo 'Não, não existe o valor pesquisado';
        ?>

        <?php
        echo "<hr>";
        //retorna null se não existir
        echo array_search("abacate", $lista);
        ?>
    </body>
</html>