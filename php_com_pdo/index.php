<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $usuario = 'root';
    $senha = '';
    //tentativa de conexao com o banco de dados, caso de errado entra no catch
    try{
        $conexao = new PDO($dsn, $usuario, $senha);
        /*Criacao da tabela caso exista
        $query = '
                create table if not exists tb_usuarios(
                    id int not null primary key auto_increment,
                    nome varchar(50) not null,
                    email varchar(100) not null,
                    senha varchar(50) not null
                )
            ';
        $retorno = $conexao->exec($query); */
        /* Modificação dentro da tabela
        $query = '
            update tb_usuarios
            set email = "alvaro@teste.com.br"
            where nome = "Alvaro Gomes"
        ';
        $retorno = $conexao->exec($query); */

        /* Inserção de valores dentro do banco de dados
        $query = '
            insert into tb_usuarios(
                nome, email, senha
            ) values("Alvaro Gomes", "alvaro@teste.com.br", 12345)
        ';
        $retorno = $conexao->exec($query);
        */

        $query = '
            select * from tb_usuarios 
        ';
        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll(PDO::FETCH_NUM);
        echo '<pre>';
        print_r($lista);
        /* Usando foreach para ter acesso ao fetch, como padrão retorna o array com indices associativos e numericos
        foreach($conexao->query($query) as $key => $valor){
            echo '<pre>';
            print_r($valor);
            echo '<hr>';
        }*/
    }
    catch(PDOException $e){
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
    }
?>