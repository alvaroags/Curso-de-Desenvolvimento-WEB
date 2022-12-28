<?php
session_start();
$atentifica_user = false;
$usuarios = [
    ['email' => 'adm@teste.com', 'senha' => '12345'],
    ['email' => 'user@teste.com', 'senha' => 'abcd']
];
    foreach($usuarios as $user){
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha'])
            $atentifica_user = true;
    }
if ($atentifica_user){
    $_SESSION['autenticado'] = 'SIM';
    echo 'Usuario atenticado';
}
else{
    $_SESSION['autenticado'] = 'Não';
    header('Location: index.php?login=erro');
}
?>