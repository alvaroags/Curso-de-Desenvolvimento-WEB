<?php
    session_start();
    foreach ($_POST as $i => $teste) {
        $_POST[$i] = str_replace('#', '-', $teste);
        if ($_POST[$i] != end($_POST)) 
            $_POST[$i] = $_POST[$i] . '#';
    }
    $texto = $_SESSION['id'] . '#' . implode($_POST) . PHP_EOL;
    $arquivo = fopen('texto.txt', 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);
    header('Location: abrir_chamado.php');
?>