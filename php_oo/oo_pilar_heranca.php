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
}
class Veiculo{
    public $cor = null;
    public $placa = null;
    function acelerar(){
        echo 'Acelerar';
    }
    function __construct($placa, $cor){
        $this->cor = $cor;
        $this->placa = $placa;
    }
}
$carro = new Carro('Abc1234', 'Branco');
$moto = new Moto('jhu6542', 'Preto');
echo $carro->acelerar();
echo $moto->acelerar();
echo '<br><pre>';
print_r($moto);
?>