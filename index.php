<!DOCTYPE html>
<html>
	<head>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57899999-2', 'auto');
  ga('send', 'pageview');

</script>
        <?php
            session_start();
            include 'html/bd.php';
        ?>
		<meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/membros.css">
        <style>
            .myMenu {
                margin-left: 20px;
            }
        </style>
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.js"></script> 
		<title>Yearbook 2014</title>
	</head>
	<body>
        <div class="grid-form myPage">
            <div id="header" class="row">
                <center><h1>Yearbook 2014</h1></center>
            </div>
            <div id="toolbar" class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">   
                    <?php
                        if (!empty($_GET['sair'])) {
                            session_destroy();
	                       ?>
		                  <script type="text/javascript">
			                 window.location = "index.php"
		                  </script>
	                       <?php
                        }
                        if(empty($_SESSION['login'])) {
                            ?>
                    <p><a href="html/login.php" class="myMenu"><span class="glyphicon glyphicon-log-in"></span>  Entrar</a></p>
                            <?php
                        } else {
                            $pdo = Database::connect();
                            $sql = "SELECT * FROM participantes WHERE login = '".$_SESSION['login']."'";
                            //foreach (mysqli_query($sql) as $usuario) {
                            foreach ($pdo->query($sql) as $usuario) {
                                ?>
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    <img src="img/<? echo $usuario['arquivoFoto'] ?>" class="imagemIcone"/>
                                    <b><?php echo $usuario['nomeCompleto'] ?></b>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu myMenu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="html/usuarioVisualizar.php?login=<?php echo $usuario['login'] ?>"><span class="glyphicon glyphicon-eye-open"></span>   Visualizar</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="html/usuarioEditar.php?editar=1"><span class="glyphicon glyphicon-pencil"></span>   Editar</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?sair=1"><span class="glyphicon glyphicon-log-out"></span>   Sair</a></li>
                                  </ul>

                                <?php
                                break;
                            }
                            //mysqli_close($conn);
                            Database::disconnect();
                            ?>
                            <?php
                        }
                    ?>
                </div>
                <div class="col-lg-8 hidden-xs hidden-sm">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span>   Filtrar</button>
                    <button class="btn btn-primary btn-lg" onClick="parent.location='mapa.php'"><span class="glyphicon glyphicon-globe"></span>   Mapa    </button>
                    <button class="btn btn-primary btn-lg" onClick="parent.location='mapa.php'" disabled><span class="glyphicon glyphicon-book"></span>   Tarefas</button>
                    <button class="btn btn-primary btn-lg" onClick="parent.location='mapa.php'" disabled><span class="glyphicon glyphicon-list-alt"></span>   Questões</button>
                </div>
                <div class="col-sm-8 col-xs-8 hidden-md hidden-lg">
                    <center>
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>
                    <button class="btn btn-primary btn-lg" onClick="parent.location='mapa.php'"><span class="glyphicon glyphicon-globe"></span></button>
                    <button class="btn btn-primary btn-lg" onClick="parent.location='mapa.php'" disabled><span class="glyphicon glyphicon-book"></span></button>
                    <button class="btn btn-primary btn-lg" onClick="parent.location='mapa.php'" disabled><span class="glyphicon glyphicon-list-alt"></span></button>
                    </center>
                </div>
            </div>
            <br>
            <div id="users">
            <ul id="menu">
                <?php

$host = "104.41.1.8";
$username = "bd37c453562cbb";
$password = "97020585";
$dbname = "yearbook2db";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM participantes WHERE nomeCompleto LIKE '%".$filtro."%' ORDER BY nomeCompleto";
$result = mysqli_query($conn, $sql

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "login: ".$row["login"]."<br>";
    }
} else {
    echo "0 results";
}


mysqli_close($conn); 
?> 
                <?php                    
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM participantes ORDER BY nomeCompleto';
                    if (empty($_POST)) {
                        if (!empty($_COOKIE['ultimoUsuarioVisualizado'])) { 
                            $ultimoUsuarioVisualizado = $_COOKIE['ultimoUsuarioVisualizado'];
                        }
                    } else {
                        $filtro = $_POST['filtro'];
                        $sql = "SELECT * FROM participantes WHERE nomeCompleto LIKE '%".$filtro."%' ORDER BY nomeCompleto";
                    }

                    $result = $pdo->query($sql);

                    if($result->rowCount() == 0)                        
                        echo '<div><p>Nenhum usuário encontrado.</p></div>';                        
                    else
                        foreach ($result as $row) {
                        ?>
                        <li>
                            <div class="item">
                                <a href="html/usuarioVisualizar.php?login=<?php echo $row['login'] ?>">
                                    <img src="img/<?php echo $row['arquivoFoto'] ?>" alt="<?php echo $row['nomeCompleto'] ?>" class="imagemGrande" />
                                    <p><h5><?php echo strlen($row['nomeCompleto']) > 17 ? substr($row['nomeCompleto'], 0, 17)."..." : $row['nomeCompleto'] ?></h5></p>
                                </a>
                            </div>
                        </li>
                        <?php
                    }
                    Database::disconnect();
                ?>
            </ul>
            </div>
        </div>
        <!-- Modal -->
        <form action="index.php" method="post">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Filtrar Usuários</h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="filtro" placeholder="Nome" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" >Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
	</body>
</html>