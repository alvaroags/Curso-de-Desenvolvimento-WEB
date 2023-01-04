<?php
    require_once "validador_acesso.php";
    $chamados = array();
    $arquivo = fopen('../texto.txt', 'r');
    //Le linha por linha e coloca em forma de matriz a linha divida pelo caractere #
    while (!feof($arquivo)){
        $texto = fgets($arquivo);
        $chamados[] = explode('#', $texto);
      }
    $count = count($chamados);
    //Faz a seperação de acesso do usuario de acordo com seu perfil. Os usuarios so podem ter acesso a chamados feitos por eles mesmos
    for ($i = 0; $i < $count; $i++) {
        if (count($chamados[$i]) < 3 || ($_SESSION['perfil_id'] == 2) && $_SESSION['id'] != $chamados[$i][0]) {
            unset($chamados[$i]);
        }
    }
    $indices = array_keys($chamados);
    fclose($arquivo);
?>