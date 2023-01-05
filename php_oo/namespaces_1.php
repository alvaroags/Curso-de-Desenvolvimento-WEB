<?php
//Namespaces fazem uma divisão no codigo, com ele é possivel usar o mesmo objeto so que com valores diferentes e independentes entre si. Para usar precisa colocar a contra barra antes e informar o namespace desejado
namespace A;

class Cliente implements \B\CadastroInterface{
    public $nome = 'Alvaro';
    public function __construct(){
        echo '<pre>';
        print_r(get_class_methods($this));
    }
    public function __get($attr){
        return $this->$attr;
    }
    public function remover(){
        echo 'Remover';
    }
    public function salvar(){
        echo 'Salvar';
    }
}

Interface CadastroInterface{
    public function remover();
}

namespace B;

class Cliente {
    public $nome = 'Jose';
    public function __construct(){
        echo '<pre>';
        print_r(get_class_methods($this));
    }
    public function __get($attr){
        return $this->$attr;
    }
    public function salvar(){
        echo 'Salvar';
    }
}

interface CadastroInterface{
    public function salvar();
}
$cliente = new \A\Cliente();
?>