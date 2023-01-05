<?php

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

?>