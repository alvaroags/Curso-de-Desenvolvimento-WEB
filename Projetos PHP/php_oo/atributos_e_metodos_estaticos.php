<?php
//Metodos estaticos podem ser acessados sem a necessidade de serem instanciados
//Para acessar uma variavel ou função estatica deve usar o operador '::';
//Metodos estaticos não podem acessar metodos não estaticos
//Metodos estaticos não podem usar o operador '->' e nem '$this';
class Exemplo{
    public static $atributo1 = 'Eu sou um atributo estatico';
    public $atributo2 = 'Eu sou um atributo normal';
    public static function metodo1(){
        echo 'Eu sou um metodo estatico';
    }
    public  function metodo2(){
        echo 'Eu sou um metodo normal';
    }
}
echo Exemplo::$atributo1 . '<br>';
Exemplo::metodo1();

?>