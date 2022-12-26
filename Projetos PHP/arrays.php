<html>
    <head>
        <title>Arrays Basicos</title>
    </head>
    <body>
        <?php  //vetores
        $lista = ['uva', 'pera', 'caju', 'maçã'];
        $lista[] = 'jabuticaba';
        echo "<pre>";
        print_r($lista);
        ?>

        <?php  //matrizes
        $lista_coisas = [];
        $lista_coisas['frutas'] = [1 => 'uva', 2 => 'pera', 3 => 'morango'];
        $lista_coisas['pessoas'] = [1 => 'José', 2 => 'João', 3 => 'Maria'];
        $lista_coisas['frutas'][] = 'abacaxi';
        echo '<pre>';
        print_r($lista_coisas);
        ?>
    </body>
</html>