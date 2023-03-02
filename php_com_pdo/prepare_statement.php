<?php

if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO($dsn, $usuario, $senha);
        
        $query = "select * from tb_usuarios where nome = :usuario AND senha = :senha";
        // $query .= " email = :usuario ";
        // $query .= " AND senha = :senha ";
        
        $stmt = $conexao->prepare($query);
        
        $stmt->bindValue(':usuario', $_POST['usuario']);
        $stmt->bindValue(':senha', $_POST['senha']);
        
        $stmt->execute();
        $usuario = $stmt->fetchAll();
        
        echo '<pre>';
        print_r($usuario);
        echo '<pre>';
        print_r($_POST);
    } catch(PDOException $e){
        echo `Erro: '{$e->getcode()}' Mensagem '{$e->getMessage()}'`;
    }
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Prepare Statement</title>
        <style>
            body{
                padding: 20px;
            }
            input{
                margin: 5px;
            }
        </style>
    </head>
    <body>
        <div>
            <form action="prepare_statement.php" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario"><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha"><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>