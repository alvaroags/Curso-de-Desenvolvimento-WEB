<?php
session_start();
$atentifica_user = false;
$id_user = null;
$perfil_user = null;
$_SESSION['autenticado'] = false;
$usuarios = [
    ['id' => 1, 'email' => 'adm@teste.com', 'senha' => '1234', 'perfil_id' => 1],
    ['id' => 2, 'email' => 'user@teste.com', 'senha' => '1234', 'perfil_id' => 1],
    ['id' => 3, 'email' => 'jose@teste.com', 'senha' => '1234', 'perfil_id' => 2],
    ['id' => 4, 'email' => 'maria@teste.com', 'senha' => '1234', 'perfil_id' => 2]
];
    foreach($usuarios as $user){
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $atentifica_user = true;
            $id_user = $user['id'];
            $perfil_user = $user['perfil_id'];
        }
    }
if ($atentifica_user){
    $_SESSION['autenticado'] = true;
    $_SESSION['id'] = $id_user;
    $_SESSION['perfil_id'] = $perfil_user;
    header('Location: home.php?');
}
else{
    $_SESSION['autenticado'] = false;
    header('Location: index.php?login=erro');
}
?>