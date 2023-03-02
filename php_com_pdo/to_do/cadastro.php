<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>To Do List</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <style>
            .box {
                min-height: 500px;
            }
        </style>
    </head>
    <body>
        <div class="nav">
            <nav class="navbar navbar-light">
                        <div class="container">
                            <a class="navbar-brand text-white" href="#">
                                <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                                App Lista Tarefas
                            </a>
                        </div>
                    </nav>
        </div>
        <div class="conteudo">
            <div class="box">
                <form action="tarefa_controller.php?acao=cadastrar" method="post">
                    <div class="form">
                        <h2>CADASTRO</h2>
                        <?php if(isset($_GET['erro']) && $_GET['erro'] == 'senha') { ?>
                            <div id="text-error">As senhas não coincidem. Por favor tente novamente!</div>
                            <?php } ?>
                        <div class="inputBox">
                            <input type="email" id="email_cadastro" name="inputEmail" autocomplete="off" required>
                            <span>E-mail</span>
                        </div>
                        <div class="inputBox">
                            <input type="password" id="senha_cadastro" name="inputSenha" autocomplete="off" required>
                            <span>Senha</span>
                            <div class="show" onclick="showHidden('senha_cadastro')"></div>
                            <div class="verifica_senha"></div>
                        </div>
                        <div class="inputBox">
                            <input type="password" id="confirma_senha_cadastro" name="inputConfirmaSenha" autocomplete="off" required>
                            <span>Confirme sua senha</span>
                            <div class="show" onclick="showHidden('confirma_senha_cadastro')"></div>
                        </div>
                        <div class="links">
                            <a href="registra.php">Login</a>
                        </div>
                        <button type="submit" class="btn-envia">CADASTRAR</button>
            
                    </div>
                </form>
            </div>
        </div>
        <script>
            function Verifica_senha(senha){
                let i = 0
                if(senha.length > 6)
                    i++
                if(senha.length >=10)
                    i++
                if(/[A-Z]/.test(senha))
                    i++
                if(/[0-9]/.test(senha))
                    i++
                if(/[A-Za-z0-9]/.test(senha))
                    i++
                return i
            }

            let form = document.querySelector('.form')
            document.addEventListener("keyup", function(){
                let senha = document.querySelector('#senha_cadastro').value

                let t_senha = Verifica_senha(senha)
                form.classList.remove('fraca')
                form.classList.remove('media')
                form.classList.remove('forte')
                if(t_senha <= 2){
                    form.classList.add('fraca')
                } else if(t_senha > 2 && t_senha <= 4) {
                    form.classList.add('media')
                } else {
                    form.classList.add('forte')
                }
            })

            function showHidden(input){
                let pass = document.getElementById(input)
                let show = document.querySelector('.show')
                if(pass.type === 'password'){
                    pass.setAttribute('type', 'text')
                    show.classList.add('hide')
                }else{
                    pass.setAttribute('type', 'password')
                    show.classList.remove('hide')
                }
            }
            let meuInput = document.getElementById('email_cadastro');

            meuInput.addEventListener('input', () => {
            if (meuInput.value) {
                meuInput.classList.add('com-conteudo');
            } else {
                meuInput.classList.remove('com-conteudo');
            }
            });
    </script>
    </body>
</html>