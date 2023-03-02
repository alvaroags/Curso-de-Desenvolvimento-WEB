<?php
class CadastroUser{
    private $conexao;
    private $usuario;

    public function __construct(Conexao $conexao, Usuario $usuario){
        $this->conexao = $conexao->conectar();
        $this->usuario = $usuario;
    }
    public function cadastrar(){
        $query = 'insert into tb_pessoas(email, senha, id_acesso)values(:email,:senha,:id_acesso)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $this->usuario->__get('email'));
        $stmt->bindValue(':senha', $this->usuario->__get('senha'));
        $stmt->bindValue(':id_acesso', $this->usuario->__get('id_acesso'));
        return $stmt->execute();
    }
    
    public function logar(){
        $query = 'SELECT * FROM tb_pessoas WHERE email = :email AND senha = :senha';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $this->usuario->__get('email'));
        $stmt->bindValue(':senha', $this->usuario->__get('senha'));
        $stmt->execute();
        session_start();
        if($stmt->rowCount() > 0){
            $_SESSION['email'] = $this->usuario->__get('email');
            $_SESSION['autenticado'] = true;
            $query = '
            select 
                id_pessoa
            from 
                tb_pessoas
            where
                email = :pessoa ';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':pessoa', $_SESSION['email']);
            $stmt->execute();
            $return = $stmt->fetchAll(PDO::FETCH_OBJ);
            $id_user = $return[0]->id_pessoa;
            $_SESSION['id_usuario'] = $id_user;
            header('Location: index.php');
        } else{
            session_destroy();
            header('Location: registra.php?erro=invalido');
        }
    }
}

?>
