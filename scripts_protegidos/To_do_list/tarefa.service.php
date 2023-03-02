<?php

if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();

class TarefaService{
    private $conexao;
    private $tarefa;
    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }
    public function inserir(){
        $query = 'insert into tb_tarefa(tarefa, id_pessoa, id_status)values(:tarefa,:id_user, 1)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id_user', $_SESSION['id_usuario']);
        return $stmt->execute();
    }
    public function recuperar(){
        $query = '
        SELECT t.id_tarefa, t.id_status, s.status, t.tarefa 
        FROM tb_tarefa t 
        LEFT JOIN tb_status s ON t.id_status = s.id_status
        INNER JOIN tb_pessoas p ON t.id_pessoa = p.id_pessoa
        WHERE p.id_pessoa = :id_user ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_user', $_SESSION['id_usuario']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function recuperar_pendente(){
        $query = '
        SELECT t.id_tarefa, t.id_status, s.status, t.tarefa 
        FROM tb_tarefa t 
        LEFT JOIN tb_status s ON t.id_status = s.id_status
        INNER JOIN tb_pessoas p ON t.id_pessoa = p.id_pessoa
        WHERE p.id_pessoa = :id_user AND t.id_status = 1';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_user', $_SESSION['id_usuario']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function atualizar(){
        $query = 'update tb_tarefa set tarefa = :tarefa where id_tarefa = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function remover(){
        $query = 'delete from tb_tarefa where id_tarefa = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function marcarRealizada(){
        $query = 'update tb_tarefa set id_status = :id_status where id_tarefa = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    
}

?>