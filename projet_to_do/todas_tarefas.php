<?php
$acao = 'recuperar';
require 'tarefa_controller.php';
?>
    <h4>Todas tarefas</h4>
        <hr />
        <?php
            $ultimo = end($tarefas);
            foreach($tarefas as $tarefa){
        ?>
            <div class="row mb-3 d-flex align-items-center tarefa">
                <div class="col-sm-9" id="tarefa_<?=$tarefa->id_tarefa?>">
                        <p style="display: inline-block; margin: 0px; padding: 0px;"><?= $tarefa->tarefa?></p>  <strong>
                            <?php if($tarefa->status == 'realizado') { ?> <p class="text-success-novo" style="margin: 0px; padding: 0px; display: inline-block;">(<?= $tarefa->status?>)</p><?php }
                            else { ?> <p class="text-danger-novo" style="margin: 0px; padding: 0px; display: inline-block;">(<?= $tarefa->status?>)</p> <?php } ?>
                        
                        </strong>
                </div>
                <div class="col-sm-3 mt-2 d-flex justify-content-between">
                    <i class="fas fa-check-circle fa-lg" style="color: #079D4A;"
                        onclick="mudaRealizada(<?=$tarefa->id_tarefa?>, '<?=$tarefa->status?>', 'todas_tarefas.php', 'todas')"></i>

                    <i class="fas fa-edit fa-lg" 
                    onclick="editar(<?=$tarefa->id_tarefa?>, '<?=$tarefa->tarefa?>', 'todas_tarefas.php', 'todas')"></i>
                    
                    <i class="fas fa-trash-alt fa-lg" 
                    onclick="deletar(<?=$tarefa->id_tarefa?>, '<?=$tarefa->tarefa?>',
                    '<?=$tarefa->status?>', 'todas_tarefas.php', 'todas')"></i>

                </div>
            </div>
            <?php if($ultimo->id_tarefa != $tarefa->id_tarefa){ ?>
                <hr>
            <?php } ?>
        <?php } 
        if(empty($tarefas)) { ?>
            <div class="row mb-3 d-flex align-items-center tarefa">
                <div class="col-sm-12">
                    <h4 class="text-empty"> Você não tem tarefas cadastras! :( </h4>
                </div>
            </div>
        <?php } ?>
        <!-- <script>
            let inp = document.querySelector('.check')
            inp.addEventListener('click', function(){
                inp.classList.toggle('ativo')
            })
        </script> -->