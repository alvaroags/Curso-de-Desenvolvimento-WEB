<?php

class Mensagem{
    private $para = null;
    private $assunto = null;
    private $mensagem = null;
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function mensagemValida(){
        if(!filter_var($this->para, FILTER_VALIDATE_EMAIL) || empty($this->assunto) || empty($this->mensagem)){
            return false;
        } else{
            return true;
        }
    }

}
$mensagem = new Mensagem();
foreach ($_POST as $id => $msg){
    $mensagem->__set($id, $msg);
}
// print_r($mensagem);
if($mensagem->mensagemValida()){
    echo 'Deu certo';
} else{
    header('Location: index.php?valida=erro');
}
?>