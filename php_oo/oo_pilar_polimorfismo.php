<?php

class Carro extends Veiculo{
    public $tetoSolar = true;
    function abrirTetoSolar(){
        echo 'Abrir teto solar';
    }
    function alterarPosicaoVolante(){
        echo 'Alterar posição volante';
    }
}
class Moto extends Veiculo{
    public $contraPeso = true;
    function empinar(){
        echo 'Empinar';
    }
    function trocarMarcha(){
        echo 'Desengatar embreagem com a mão e trocar marcha com o pé';
    }
}

class Veiculo{
    public $cor = null;
    public $placa = null;
    function __construct($placa, $cor){
        $this->cor = $cor;
        $this->placa = $placa;
    }
    function acelerar(){
        echo 'Acelerar';
    }
    function freiar(){
        echo 'Freiar';
    }
    function trocarMarcha(){
        echo 'Desengatar marcha com o pé e trocar a marcha com a mão';
    }
}

$carro = new Carro('Abc1234', 'Branco');
$moto = new Moto('jhu6542', 'Preto');
$carro->trocarMarcha();
$moto->trocarMarcha();
?>