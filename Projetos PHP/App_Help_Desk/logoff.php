<?php
    session_start();
    //unset() remover indices do array de sessão e remove se apenas existir
    // unset($_SESSION['autenticado']);

    //session_destroy() remove a sessão inteira
    session_destroy();
    header('Location: index.php');
?>