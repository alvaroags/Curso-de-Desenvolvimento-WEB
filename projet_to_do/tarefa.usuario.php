<?php

class Usuario{
    private $email;
    private $senha;
    private $id_usuario;
    private $id_acesso;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>