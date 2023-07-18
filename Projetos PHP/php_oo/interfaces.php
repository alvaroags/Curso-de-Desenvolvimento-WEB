<?php
//Interfaces são uma boa ideia para equipes de desenvolvimento, pois gera um certo padrão na hora de dar nomes as funções, pois poderia haver a mesma função com nomes diferentes. Usando interfaces voce meio que obriga o programador a utilizar um nome especifico para um metodo e quais metodos ele deve atribuir

//Mais de uma interface pode ser adicionada
//Interfaces tambem podem receber herança, ou seja, uma interface contem outra e então o objeto tera que criar as 2 interfaces
interface EquipamentosEletronicoInterface{
    public function ligar();
    public function desligar();
}

class Geladeira implements EquipamentosEletronicoInterface{
    public function abrirPorta(){
        echo 'Abrir porta';
    }
    public function ligar(){
        echo 'Ligar';
    }
    public function desligar(){
        echo 'Desligar';
    }
}
class Tv implements EquipamentosEletronicoInterface{
    public function trocarCanal(){
        echo 'Trocar de canal';
    }
    public function ligar(){
        echo 'Ligar';
    }
    public function desligar(){
        echo 'Desligar';
    }
}
$geladeira = new Geladeira();
$tv = new Tv();

//---------------------------

interface MamiferoInterface{
    public function respirar();
}
interface TerrestreInterface{
    public function andar();
}
interface AquaticoInterface{
    public function nadar();
}
class Humano implements MamiferoInterface, TerrestreInterface{
    public function andar(){
        echo 'Andar <br>';
    }
    public function respirar(){
        echo 'Respirar <br>';
    }
    public function conversar(){
        echo 'Conversar <br>';
    }
}
class Baleia implements MamiferoInterface, AquaticoInterface{
    public function respirar(){
        echo 'Respirar <br>';
    }
    public function nadar(){
        echo 'Nadar <br>';
    }
    public function esguichar(){
        echo 'Esguichar agua <br>';
    }
}
$humano = new Humano();
$baleia = new Baleia();
$humano->andar();
$humano->conversar();
$humano->respirar();
$baleia->nadar();
$baleia->esguichar();
$baleia->respirar();

//-----------
 
interface AnimalInterface{
    public function comer();
}
interface AveInterface extends AnimalInterface{
    public function voar();
}
class Papagaio implements AveInterface{
    public function voar(){
        echo 'Voar <br>';
    }
    public function comer(){
        echo 'Comer <br>';
    }
}
?>