<?php

    //modelo
class Funcionario{
    public $nome = "Alvaro Gomes";
    public $telefone = "(37)99999-9999";
    public $numFilhos = 0;
    function resumirCadFunc(){
        return "$this->nome possui $this->numFilhos filho(s)";
    }
    function modificarNumFilhos($numFilhos){
        $this->numFilhos = $numFilhos;
    }
}
//metodos
$funcionario = new Funcionario();
echo $funcionario->resumirCadFunc();
$funcionario->modificarNumFilhos(3);
echo '<br>';
echo $funcionario->resumirCadFunc();
?>