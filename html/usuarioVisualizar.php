<?php
    session_start();
    if (empty($_SESSION['login'])) {
        header("location:../html/login.php");
    }
    require 'bd.php';
?>
     
<!DOCTYPE html>
<html lang="pt">
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
    <link rel="stylesheet" type="text/css" href="../css/membros.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 0px;
            padding-bottom: 40px;
            padding-left: 0px;
            background-color: #eee;
        }
        .myItem {
            padding-left: 10px;
        }
        .myPanel {
            margin: 10px;
        }
    </style>
    <script type="text/javascript" src="../js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script> 
</head>
    <body>
        <div id="header" class="row">
            <center><h1>Yearbook 2014</h1></center>
        </div>
        <div id=nav>
            <ol class="breadcrumb">
                <li><a href="javascript:history.back(-1);"><span class="glyphicon glyphicon-home"></span>   Home</a> <span class="divider"></span></li>
                <li class="active">Visualizar Usuário</li>
            </ol>
        </div>
        <div class="grid-form myItem">
        <div class="panel panel-primary myPanel">
        <div class="panel-heading">Usuário</div>
        <div class="panel-body">
        <center>
            <?php
    if (!empty($_GET)) {
        $login = $_GET['login'];            
        
        $pdo = Database::connect();
        $sql = 'SELECT * FROM participantes';
        foreach ($pdo->query($sql) as $row) {
            if($row['login'] == $login) {
                setcookie("ultimoUsuarioVisualizado", $login);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <img src="../img/<?= $row['arquivoFoto'] ?>" alt="<?= $row['nomeCompleto']?>" class="imagemGrande"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Nome: <?= $row['nomeCompleto'] ?></p>
                    </div>
                </div>
                        
                <?php
                    $sql2 = 'SELECT * FROM cidades';
                    foreach ($pdo->query($sql2) as $cidade) {
                    if ($row['cidade'] == $cidade['idCidade']) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p>Cidade: <?= $cidade['nomeCidade'] ?></p>
                            </div>
                        </div>
                        
                        <?php
                        $sql3 = 'SELECT * FROM estados';
                        foreach ($pdo->query($sql3) as $estado) {
                            if ($cidade['idEstado'] == $estado['idEstado']) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Estado: <?= $estado['nomeEstado'] ?></p>
                                    </div>
                                </div>
                            <?php
                                break;
                            }
                        }
                        break;
                    }
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <p>Email: <?=$row['email']?></p>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Descrição: <?= $row['descricao'] ?></p>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-default" onClick="javascript:history.back(-1)">Voltar</button>
                        </div>
                    </div>
                <?php
            }
        }
        Database::disconnect();        
    }?>
        </center>
        </div>
        </div>
        </div>    
    </body>
</html>