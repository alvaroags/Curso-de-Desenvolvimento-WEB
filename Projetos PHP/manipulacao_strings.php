<html>
    <head>
        <title>Manipulação de strings</title>
    </head>
    <body>
        <?php
        $texto = "Funções nativas";
        //todas em minusculo
        echo strtolower($texto) .'</br>';
        //Todas em maiusculo
        echo strtoupper($texto) .'</br>';
        //Primeira letra em maiusculo
        echo ucfirst($texto) .'</br>';
        //Contas as letras
        echo strlen($texto) .'</br>';
        //Procura uma palavra e substitui por outra
        echo str_replace("nativas", "próprias", $texto) .'</br>';
        //Printa uma certa quantidade de caracteres
        echo substr($texto, 0, 14);
        ?>
    </body>
</html>