<?php

namespace A;

class Cliente implements CadastroInterface{
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
}

Interface CadastroInterface{
    public function remover();
}
?>