<h4>Nova tarefa</h4>
    <hr />
    <form action="envio_email.php" method="post" id="form-loading">
        <div class="form-group">
        <div class="info-email">
            <?php if(isset($_GET['insercao']) && $_GET['insercao'] == true){ ?>
                    <h5 class="display-4 text-success">Sucesso</h5>
                    <p>Email enviado com sucesso</p>
                <?php } ?>
                <?php if(isset($_GET['insercao']) && $_GET['insercao'] == false){ ?>
                    <h5 class="display-4 text-danger">Ops!</h5>
                    <p>Não foi possivel enviar este email. Por favor tente mais tarde</p>
                <?php } ?>
        </div>
            <label>Descrição da tarefa:</label>
            <input type="text" class="form-control" name="tarefa" placeholder="Exemplo: Lavar o carro" id="input_tarefa">
            <div class="container-loading" id="container-loading" style="display: none;">
				<div class="loading">
					<span></span>
				</div>
			</div>
        </div>
        <button type="submit" class="btn btn-novo" onclick="inserir('nova_tarefa.php', 'nova');loading()">Cadastro</button>
    </form>
             