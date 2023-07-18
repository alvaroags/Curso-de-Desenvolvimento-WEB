<?php

require 'validador.login.php';
$acao = 'recuperar';
require 'tarefa_controller.php';


?>

<html>
    <head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>To Do List</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<style>
			body{
				background-color: #202020;
			}
			
			hr{
				border-color: #727271;
			}
			#tarefa p{
				color: black;
				margin: 0px;
				padding: 0px; 
				display: inline-block;
			}
		</style>
		<script>
			function limpaInformacao(){
				document.getElementById('tarefa').className = ''
				document.getElementById('tarefa').innerHTML = ''
			}
			function Requisicoes (url, id) {
				if(document.getElementById('tarefa'))
					limpaInformacao()
				fetch(url).then(Response => Response.text()).then(data =>{
					document.getElementById('conteudo').innerHTML = data
					mudaCorBotao(id)
				})
			}
			function mudaCorBotao(id){
				if(document.getElementById(id)){
					resetaBotao()
					document.getElementById(id).classList.add('active')
				}
			}
			
			function resetaBotao() {
  				const elements = document.querySelectorAll('.active');
 				elements.forEach(element => {
    				element.classList.remove('active');
  				});
			}
		
			function verificaURL(t_tarefa){
				tarefa = '<h5>Tarefa ' + t_tarefa + ' com sucesso!</h5>'
				document.getElementById('tarefa').innerHTML = tarefa
				document.getElementById('tarefa').className = 'pt-2 text-white d-flex justify-content-center'
			}

			function criaForm(id, classe, acao, id_status){
				let form = document.createElement('form')
				form.method = 'post'
				form.action = acao
				form.className = classe

				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				let inputStatus = document.createElement('input')
				inputStatus.type = 'hidden'
				inputStatus.name = 'id_status'

				if(id_status === 1)
					inputStatus.value = 2
				else
					inputStatus.value = 1

				form.appendChild(inputStatus)
				form.appendChild(inputId)
				
				return form
			}

			function insereForm(id, form){
				let tarefa = document.getElementById('tarefa_'+id)
				tarefa.innerHTML = ''
				tarefa.insertBefore(form, tarefa[0])
			}

			async function inserir(url, id_url){
				form = criaForm('', '', 'tarefa_controller.php?acao=inserir')

				let inputValue = document.createElement('input')
				inputValue.type = 'hidden'
				inputValue.value = document.getElementById('input_tarefa').value
				inputValue.name = 'input_nova_tarefa'

				form.appendChild(inputValue)

				await fetch('tarefa_controller.php?acao=inserir', {
					method: 'POST',
					body: new FormData(form)
				})

				Requisicoes(url, id_url, 2)
				verificaURL('inserida')
			}

			function editar(id, txt_tarefa, url, id_url){

				form = criaForm(id, 'row', 'tarefa_controller.php?acao=atualizar')
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'col-9 form-control'
				inputTarefa.value = txt_tarefa
		
				let button = document.createElement('button')
				button.type = 'button'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'
		
				form.appendChild(inputTarefa)
				form.appendChild(button)

				insereForm(id, form)

				button.addEventListener("click", async function(){
					await fetch('tarefa_controller.php?acao=atualizar', {
						method: 'POST',
						body: new FormData(form)
					})
					Requisicoes(url, id_url, 2)
					verificaURL('atualizada')
				})
        	}

			function deletar(id, txt_tarefa, txt_status, url, id_url){

				form = criaForm(id, 'text-center form-deletar', 'tarefa_controller.php?acao=deletar')
				let texto = document.createElement('h6')
				texto.textContent = "Tem certeza que deseja excluir a tarefa?"

				let btnSim = document.createElement('button')
				btnSim.type = 'button'
				btnSim.innerHTML = 'SIM'
				btnSim.className = 'col-3 btn btn-outline-success mx-2 text-white'
				
				let btnNao = document.createElement('button')
				btnNao.type = 'button'
				btnNao.innerHTML = 'NÃO'
				btnNao.className = 'col-3 btn btn-outline-danger mx-2 text-white'
				
				form.appendChild(texto)
				form.appendChild(btnSim)
				form.appendChild(btnNao)

				insereForm(id, form)

				btnSim.addEventListener("click", async function(){
					await fetch('tarefa_controller.php?acao=deletar', {
						method: 'POST',
						body: new FormData(form)
					})
					Requisicoes(url, id_url, 2)
					verificaURL('deletada')
				})
				btnNao.addEventListener("click", function(){
					Requisicoes(url, id_url)})
			}
			async function mudaRealizada(id, id_status, url, id_url) {
				const form = criaForm(id, 'row', 'tarefa_controller.php', id_status)

				let inputStatus = document.createElement('input')
				inputStatus.type = 'hidden'
				inputStatus.name = 'id_status'

				if(id_status == 'realizado')
					inputStatus.value = 1
				else
					inputStatus.value = 2

				form.appendChild(inputStatus)

				await fetch('tarefa_controller.php?acao=marcarRealizada', {
					method: 'POST',
					body: new FormData(form)
				});
				
				Requisicoes(url, id_url, 2)
			}
			function loading(){
				const loading = document.querySelector('.container-loading')
				const btn = document.querySelector('.btn-novo').setAttribute('disabled', true)
				loading.style.display = 'block'
			}

		</script>
		
	</head>
    <body>
        <nav class="navbar navbar-light">
			<div class="container">
				<a class="navbar-brand text-white" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
				<a href="logoff.php"><button class="btn btn-novo">Sair</button></a>
			</div>
		</nav>
		<div id="tarefa">
			<?php if(isset($_GET['insercao']) && $_GET['insercao'] == true) { ?>
				<script>
					Requisicoes('nova_tarefa.php', 'nova')
					const url = new URL(window.location.href);
					url.searchParams.delete('insercao');
					window.history.replaceState({}, '', url);
					verificaURL('inserida')
				</script>
			<?php } else { ?>
				<script>
					if(performance.navigation.type === 1 || performance.navigation.type === 0)
					Requisicoes('pendente.php', 'pendente', 1)
				</script>
			<?php }?>
		</div>
        <div class="container app">
			<div class="row">
					<div class="col-md-3 menu">
						<ul class="list-group">

							<li class="list-group-item" id="pendente"><a href="#">Tarefas pendentes</a></li>

							 <li class="list-group-item" id="nova"><a href="#">Nova tarefa</a></li>

							<li class="list-group-item" id="todas"><a href="#">Todas tarefas</a></li>
						</ul>
					</div>
					<div class="col-md-9">
						<div class="container pagina">
							<div class="row">
								<div class="col" id="conteudo"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
<script>
	document.getElementById('pendente').addEventListener("click", function(){
				Requisicoes('pendente.php', 'pendente', 1);
				})
	document.getElementById('nova').addEventListener("click", function(){
				Requisicoes('nova_tarefa.php', 'nova', 1);
				})
	document.getElementById('todas').addEventListener("click", function(){
				Requisicoes('todas_tarefas.php', 'todas', 1);
				})
	

</script>
