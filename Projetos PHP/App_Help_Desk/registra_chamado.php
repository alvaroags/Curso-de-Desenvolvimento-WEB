<?php

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo 'teste';
    
    // session_start();
    // foreach ($_POST as $i => $teste) {
    //     //Muda qualquer caractere # por -
    //     $_POST[$i] = str_replace('#', '-', $teste);
    //     if ($_POST[$i] != end($_POST)) 
    //         $_POST[$i] = $_POST[$i] . '#';
    // }
    // //Escreve em um arquivo txt o chamado da pessoa e coloca no inicio o id do usuario que fez o chamado
    // $texto = $_SESSION['id'] . '#' . implode($_POST) . PHP_EOL;
    // $arquivo = fopen('../texto.txt', 'a');
    // fwrite($arquivo, $texto);
    // fclose($arquivo);
    // header('Location: abrir_chamado.php');
?>