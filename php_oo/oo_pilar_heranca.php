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
//Como carro e moto são veiculos eles tem coisas em comum, como uma forma de reduzir a produção de codigo é possivel usar a herança para atribuir uma classe dentro de outra
//Para fazer a conexão basta na classe filho usar o comando 'extends' e o nome da classe pai e todas as variaveis e funçãos da classe pai estará disponivel na filho
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
//Usando a função construct da classe pai para instanciar declarando novos valores nas classes filhos
$carro = new Carro('Abc1234', 'Branco');
$moto = new Moto('jhu6542', 'Preto');
echo $carro->acelerar();
echo $moto->acelerar();
echo '<br><pre>';
print_r($moto);
?>