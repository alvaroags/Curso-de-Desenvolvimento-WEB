<?php

class Pessoa{
    public $nome = null;
    function __construct($nome){
        $this->nome = $nome;
        echo 'Objeto iniciado';
    }
    function __destruct(){
        echo '<br>Objeto removido';
    }
    function __get($atributo){
        return $this->$atributo;
    }
}
$pessoa = new Pessoa("Alvaro");
echo '<br> Nome: ' . $pessoa->__get('nome');
unset($pessoa);
?>