<?php

require "../../scripts_protegidos/To_do_list/tarefa.model.php";
require "../../scripts_protegidos/To_do_list/tarefa.service.php";
require "../../scripts_protegidos/To_do_list/conexao.php";
require "../../scripts_protegidos/To_do_list/tarefa.usuario.php";
require "../../scripts_protegidos/To_do_list/tarefa.login.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'inserir') {
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['input_nova_tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();
} 

else if ($acao == 'recuperar') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
}
else if ($acao == 'recuperar_pendente') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar_pendente();
}

else if($acao == 'atualizar'){
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    if($tarefaService->atualizar())
        header('Location: index.php');
}

else if($acao == 'deletar'){
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->remover();
}

else if($acao == 'marcarRealizada'){
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('id_status', $_POST['id_status']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);

    $tarefaService->marcarRealizada();
}

else if($acao == 'cadastrar'){
    if ($_POST['inputSenha'] == $_POST['inputConfirmaSenha']) {
        $usuario = new Usuario();
        $usuario->__set('email', $_POST['inputEmail']);
        $usuario->__set('senha', $_POST['inputSenha']);
        $usuario->__set('id_acesso', 2);

        $conexao = new Conexao();

        $tarefaCadastro = new CadastroUser($conexao, $usuario);
        if ($tarefaCadastro->cadastrar())
            header('Location: registra.php?cadastro=true');
        else
            header('Location: cadastro.php?cadastro=false');
    } else
        header('Location: cadastro.php?erro=senha');

}

else if($acao == 'login'){
    $usuario = new Usuario();
    $usuario->__set('email', $_POST['inputEmail']);
    $usuario->__set('senha', $_POST['inputSenha']);
    $conexao = new Conexao();
    
    $tarefaLogin = new CadastroUser($conexao, $usuario);
    $tarefaLogin->logar();
}
?>