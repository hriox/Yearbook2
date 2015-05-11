<!DOCTYPE html>
<?php
    include 'bd.php';
?>
<html lang="pt_br">
  <head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57899999-2', 'auto');
  ga('send', 'pageview');

</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../favicon.ico">
    <style>
        .amarelo {
            background-color: yellow;
        }
    </style>
    <title>Yearbook 2014 - Login</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link type="text/css" href="../css/signin.css" rel="stylesheet">

  </head>
  <body>
    <div id="header" class="row">
        <center><h1>Yearbook 2014</h1></center>
    </div>
    <div class="container">
      <form class="form-signin" role="form" action="login.php" method="post">
        <center><h3 class="form-signin-heading">Autenticação</h3></center>
        <input type="text" class="form-control" placeholder="Usuário" name="login" required autofocus>
        <input type="password" class="form-control" placeholder="Senha" name="senha" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Lembrar
        </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <br>
            <p><a href="usuarioEditar.php"><center><b>Cadastrar</b> uma nova conta</center></a></p>
            <br>
            <br>
            <p class="panel"><span class="glyphicon glyphicon-warning-sign amarelo"></span> Caso deseje navegar pelas opções sem fazer cadastro utilize: <b>usuário = teste</b> e <b>senha = teste</b></p>
      </form>
    </div>
  </body>
</html>
<?php
    if(!empty($_POST)) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $pdo = Database::connect();
        $sql = "SELECT * FROM participantes WHERE login = '".$login."' AND senha = '".$senha."'";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            session_start();
            $_SESSION['login'] = $login;
	?>
		<script type="text/javascript">
			window.location = "../index.php"
		</script>
	<?php
        }
        Database::disconnect();
    }
?>