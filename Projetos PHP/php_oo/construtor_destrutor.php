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
//função construct instancia um novo objeto e com ele é possivel passar alguns parametros que ele reconhece e atribui conforme a função construct foi feita
$pessoa = new Pessoa("Alvaro");
echo '<br> Nome: ' . $pessoa->__get('nome');
//Função destruct faz a remoção de um objeto e para usar ele pode usar o unset()
unset($pessoa);
?>