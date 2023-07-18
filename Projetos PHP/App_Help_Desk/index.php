<html>
  <head>
    <meta charset="utf-8" />
    <title>Teste</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="validador_login.php" method="POST">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <?php
                  //Avalia de acordo com o validador de login se o usuario digitou o usuario ou a senha invalida
                  if(isset($_GET['login']) && $_GET['login'] == 'erro'){
                ?>
                  <div class="text-danger">Usuario ou senha inválido(s)</div>
                <?php } ?>
                <?php 
                  //Avalia se o usuario fez o login e printa na tela uma mensagem de erro e pede para logar primeiro
                  if(isset($_GET['login']) && $_GET['login'] == 'erro2'){
                ?>
                  <div class="text-danger">Valide seu usuario primeiro</div>
                <?php } ?>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>