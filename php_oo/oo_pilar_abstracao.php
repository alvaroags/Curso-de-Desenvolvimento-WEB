<?php

    //modelo
class Funcionario{
    public $nome = null;
    public $telefone = null;
    public $numFilhos = null;
    public $cargo = null;
    public $salario = null;

    function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    function __get($atributo){
        return $this->$atributo;
    }
    // function setNome($nome){
    //     $this->nome = $nome;
    // }
    // function setTelefone($telefone){
    //     $this->telefone = $telefone;
    // }
    // function setNumFilhos($numFilhos){
    //     $this->numFilhos = $numFilhos;
    // }
    // function getNome(){
    //     return $this->nome;
    // }
    // function getTelefone(){
    //     return $this->telefone;
    // }
    // function getNumFilhos(){
    //     return $this->numFilhos;
    // }
    function resumirCadFunc(){
        return "$this->nome possui $this->numFilhos filho(s)";
    }
    function modificarNumFilhos($numFilhos){
        $this->numFilhos = $numFilhos;
    }
}
//metodos
$funcionario = new Funcionario();
$funcionario->__set("nome","Álvaro");
$funcionario->__set("numFilhos", 2);
echo $funcionario->__get('nome') . ' possui ' . $funcionario->__get('numFilhos') . ' filho(s)';
echo '<hr>';
$funcionario2 = new Funcionario();
$funcionario2->__set("nome","Joao");
$funcionario2->__set("numFilhos", 4);
echo $funcionario2->__get('nome') . ' possui ' . $funcionario2->__get('numFilhos') . ' filho(s)';
?>