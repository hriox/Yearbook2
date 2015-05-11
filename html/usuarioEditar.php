<?php
    session_start();
    require 'bd.php';
?>
     
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
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/membros.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 0px;
            padding-bottom: 40px;
            background-color: #eee;
        }
        
        .myItem {
            padding-left: 5px;
            margin-left: 5px;
        }
        
        .myPanel {
            padding: 5px;
            margin: 5px;
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
                <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span>   Home</a> <span class="divider"></span></li>
                <li class="active">Editar Usuário</li>
            </ol>
        </div>
    <div class="grid-form myItem">
<?php 
    if (empty($_GET) && empty($_POST)) {
        ?>
            <form action="usuarioEditar.php" method="post" autocomplete="off">
                <div class="row">
                    <div class="col-md-2">
                        Login
                        <input name="login" type="text" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        Senha<input name="senha" type="password" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        Confirmar senha<input type="password" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Nome<input name="nomeCompleto" type="text" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        Email <input name="email" type="text" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        Cidade
                        <select name="cidade" type="" class="form-control" required>
                        <?php 
                            $pdo = Database::connect();
                            $sql = "SELECT * FROM cidades order by nomeCidade";
                            foreach ($pdo->query($sql) as $row) {
                        ?>
                            <option value="<?= $row['idCidade']?>"><?= $row['nomeCidade']?></option>
                        <?php
                            }
                             Database::disconnect();
                        ?>
                        </select>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        Foto<input name="arquivoFoto" type="file" class="form-control" value="generic.png" required readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        Descrição<textarea name="descricao" type="text" class="form-control" required draggable="false">
                        </textarea>
                    </div>
                </div>
                <input type="hidden" name="op" value="adicionar">
                <div class="row myItem">
                    <br>
                    <button type="reset" onClick="javascript:history.back(-1);" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>   Enviar</button>
                </div>
            </form>
        <?php
    } else {
        if (!empty($_GET['sair'])) {
            session_destroy();
	?>
		<script type="text/javascript">
			window.location = "../index.php"
		</script>
	<?php
            return;
        }
        
        if (!empty($_GET['editar'])) {
            $pdo = Database::connect();
            $sqlCity = "SELECT * FROM cidades order by nomeCidade";
            $cities = $pdo->query($sqlCity);
            $sql = "SELECT * FROM participantes WHERE login = '".$_SESSION['login']."'";
            foreach ($pdo->query($sql) as $row) {
    ?>
            <form action="usuarioEditar.php" method="post" autocomplete="off">
                <div class="row">
                    <div class="col-md-2">
                        Login
                        <input name="login" type="text" class="form-control" required readonly value="<?= $row['login']?>">
                    </div>
                    <div class="col-md-2">
                        Senha<input name="senha" type="password" class="form-control" required value="<?= $row['senha']?>">
                    </div>
                    <div class="col-md-2">
                        Confirmar senha<input type="password" class="form-control" required value="<?= $row['senha']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Nome<input name="nomeCompleto" type="text" class="form-control" required value="<?= $row['nomeCompleto']?>">
                    </div>
                    <div class="col-md-2">
                        Email <input name="email" type="text" class="form-control" required value="<?= $row['email']?>">
                    </div>
                    <div class="col-md-2">
                        Cidade
                        <select name="cidade" type="" class="form-control" required>
                        <?php                                                         
                            foreach($cities as $city) {
                                if($city['idCidade'] == $row['cidade']) {
                        ?>
                                    <option value="<?= $city['idCidade']?>" selected><?= $city['nomeCidade']?>  </option>
                        <?php
                                } else { 
                        ?>
                                    <option value="<?= $city['idCidade']?>"><?= $city['nomeCidade']?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        Descrição<textarea name="descricao" type="text" class="form-control" required draggable="false" value="<?= $row['descricao']?>">
                        </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <center>
                        <div class="panel panel-primary myPanel">
                            <div class="panel-heading"><center>Foto</center></div>                            
                            <div class="panel-body">
                                
                                    <img name="arquivoFoto" src="../img/<?= $row['arquivoFoto'] ?>" alt="<?= $row['nomeCompleto']?>" class="imagemGrande"/>
                            </div>
                            
                        </div>
                        </center>
                    </div>
                </div>
                <input type="hidden" name="op" value="editar">
                <div class="row myItem">
                    <br>
                    <button type="reset" onClick="javascript:history.back(-1);" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>   Enviar</button>
                </div>
            </form>
            <?php
            }
            Database::disconnect();
        } 
    }

    if (!empty($_POST)) {
        
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nomeCompleto = $_POST['nomeCompleto'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];        
        $descricao = $_POST['descricao'];
        $arquivoFoto = $_POST['arquivoFoto'];
        
        if (!empty($_POST['op'])){        
            $op = $_POST['op'];
            if ($op == 'adicionar') {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO participantes (login,senha,nomeCompleto,arquivoFoto,cidade,email,descricao) values(?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($login,$senha,$nomeCompleto,$arquivoFoto,$cidade,$email,$descricao));
                Database::disconnect();
                echo "<p>Usuário inserido</p>";
            } else if ($op == 'editar') {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$sql = "UPDATE participantes SET senha=?,nomeCompleto=?,arquivoFoto=?,cidade=?,email=?,descricao=? WHERE login = ?";
                $sql = "UPDATE participantes SET senha=?,nomeCompleto=?,cidade=?,email=? WHERE login = ?";
                $q = $pdo->prepare($sql);
                //$q->execute(array($senha,$nomeCompleto,$arquivoFoto,$cidade,$email,$descricao,$login));
                $q->execute(array($senha,$nomeCompleto,$cidade,$email,$login));
                Database::disconnect();
                echo "<p>Usuário atualizado</p>";
            }
	    echo '<script type="text/javascript">window.location = "../index.php"</script>';
        }
    }
?>
    </div>
</body>
</html>