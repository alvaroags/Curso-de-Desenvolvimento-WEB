<?php
$acao = 'recuperar_pendente';
require 'tarefa_controller.php';
?>

<h4>Tarefas pendentes</h4>
    <hr />
    <?php
    $ultimo = end($tarefas);
    foreach ($tarefas as $tarefa) {
        
        if ($tarefa->status == 'pendente') {
            ?>
            <div class="row mb-3 d-flex align-items-center tarefa">
                <div class="col-sm-9" id="tarefa_<?= $tarefa->id_tarefa ?>">
                    <p style="margin: 0px; padding: 0px; display: inline-block;"><?= $tarefa->tarefa ?></p><strong><p style="margin: 0px; padding: 0px; display: inline-block;" class="text-danger-novo"> &nbsp;(<?= $tarefa->status ?>)</p></strong>
                </div>
                <div class="col-sm-3 mt-1 d-flex justify-content-between">
                    <i class="fas fa-check-circle fa-lg" style="color: #079D4A;"
                    onclick="mudaRealizada(<?=$tarefa->id_tarefa?>, '<?=$tarefa->status?>', 'pendente.php', 'pendente')"></i>

                    <i class="fas fa-edit fa-lg " 
                    onclick="editar(<?=$tarefa->id_tarefa?>, '<?=$tarefa->tarefa?>', 'pendente.php', 'pendente')"></i>

                    <i class="fas fa-trash-alt fa-lg " 
                    onclick="deletar(<?=$tarefa->id_tarefa?>, '<?=$tarefa->tarefa?>',
                    '<?=$tarefa->status?>', 'pendente.php', 'pendente')"></i>
                    
                </div>
                </div>
            <?php if($ultimo->id_tarefa != $tarefa->id_tarefa){ ?>
                <hr>
            <?php } ?>
    <?php }
    }
    if(empty($tarefas)) { ?>
        <div class="row mb-3 d-flex align-items-center tarefa">
            <div class="col-sm-12">
                <h4 class="text-empty"> Parabens! Você não tem tarefas pendente! :) </h4>
            </div>
        </div>
    <?php } ?>
                