<?php
//Quando vc passa uma variavel ou uma função como private ela esta restrita aquele objeto não sendo passado pela herança, entretanto no caso abaixo, uma variavel private pode ser modificada em tempo de execução por meio da função magina __set e __get, com ela sendo declarada publico é possivel usar por meio da herança
//Como as funções public podem ser herdadas, o php tambem entende que se dentro dela existe alguma função private, ele tambem deve executar a private, então para acessar funções e variaveis private eu preciso colocar elas dentro de uma public
//Metodos protected podem ser passados e tambem podem ser sobrepostos, diferente da private
class Pai{
    private $nome = 'Álvaro';
    protected $sobrenome = 'Gomes';
    public $humor = 'Feliz';

    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $value)
    {
        $this->$atributo = $value;
    }
    private function executarMania(){
        echo 'Assobiar';
    }
    protected function responder(){
        echo 'Oi';
    }
    public function executarAcao(){
        $x = rand(1,10);
        if($x >= 1 && $x <= 8){
            $this->responder();
        } else{
            $this->executarMania();
        }
    }
}
class Filho extends Pai{
    // public function getAtributo($atributo){
    //     return $this->$atributo;
    // }
    // public function setAtributo($atributo, $value){
    //     $this->$atributo = $value;
    // }
}
$filho = new Filho();
echo '<pre>';
print_r($filho);
echo $filho->__get('humor');
$filho->__set('humor', 'Triste');
echo '<br>';
print_r($filho);
echo $filho->__get('humor');
$teste = new Filho();
echo '<br>';
print_r($teste);
?>