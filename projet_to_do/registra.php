<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>To Do List</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script>
            
            // function cadastro(url){
            //     fetch(url).then(Response => Response.text()).then(data =>{
            //             document.getElementById('conteudo_form').innerHTML = data
            //             console.log(data)
            //         })
            // }
            // function verificadorURL(){
            //     cadastro('cadastro.php?erro=senha')
            //     const urlParams = new URLSearchParams(window.location.search)
            //     const myParam = urlParams.get('erro')
            //     console.log(myParam)
            //     if(myParam){
            //         document.getElementById('text-error-cadastro').innerHTML = '<p>As senhas não coincidem. Por favor, tente novamente.</p>'
            //     }
                
            // }
        </script>
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
            <div class="box" id="conteudo_form">
                <form action="tarefa_controller.php?acao=login" method="post">
                    <div class="form">
                        <h2>LOGIN</h2>
                        <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == true) { ?>
                            <div id="text-error">Cadastro efetuado com sucesso</div>
                        <?php } ?>
                        <?php if(isset($_GET['erro']) && $_GET['erro'] == 'login') { ?>
                            <div id="text-error">Necessário fazer login!</div>
                        <?php } ?>
                        <?php if(isset($_GET['erro']) && $_GET['erro'] == 'invalido') { ?>
                            <div id="text-error">Usuário ou senha inválido!</div>
                        <?php } ?>
                        <div class="inputBox">
                            <input type="email" id="usuario_login" name="inputEmail" autocomplete="off" required>
                            <span>Usuario</span>
                        </div>
                        <div class="inputBox">
                            <input type="password" id="senha_login" name="inputSenha" autocomplete="off" required>
                            <span>Senha</span>
                            <div class="show" onclick="showHidden('senha_login')"></div>
                        </div>
                        <div class="links">
                            <a href="cadastro.php">Cadastro</a>
                        </div>
                        
                        <button type="submit" class="btn-envia">ENTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
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
        let meuInput = document.getElementById('usuario_login');

        meuInput.addEventListener('input', () => {
        if (meuInput.value) {
            meuInput.classList.add('com-conteudo');
        } else {
            meuInput.classList.remove('com-conteudo');
        }
        });

    </script>
</html>