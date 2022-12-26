<html>
    <head>
        <title>Pratica de loops</title>
    </head>
    <body>
        <?php
        $registro = [
            ['titulo' => 'Titulo noticia 1', 'conteudo' => 'conteudo noticia 1'],
            ['titulo' => 'Titulo noticia 2', 'conteudo' => 'conteudo noticia 2'],
            ['titulo' => 'Titulo noticia 3', 'conteudo' => 'conteudo noticia 3'],
            ['titulo' => 'Titulo noticia 4', 'conteudo' => 'conteudo noticia 4'],
        ];
        $i = 0;
        while($i < count($registro)){
            echo "<h3>" . $registro[$i]['titulo'] . "</h3>";
            echo "<p>" .$registro[$i]['conteudo'] ."</p>";
            echo "<hr>";
            $i++;
        }
        ?>
    </body>
</html>