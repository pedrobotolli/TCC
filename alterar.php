<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <title>Perfil</title>

    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">



</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="busca.php">Busca</a>
                    </li>
                    <li>
                        <a href="meuperfil.php">Perfil</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

   <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
                    <h2>Perfil</h2>
            </div>
            <div class="col-md-12 ">
                <form enctype="multipart/form-data" action="alteracao.php" method="post">
                <fieldset>
                <legend>Altere seu perfil!</legend>
                <div style="float:left;width:30%;">
                  
                </div>
                <div style="float:left;width:70%;">
                <p>
<?php
session_start();
include 'conexao.php';
if($_SESSION['cod'] == 2){
	$p = $_SESSION['email'];
    $selecao = "select p.cd_cpf_prestador, nm_prestador, nm_email,nr_telefone,ds_curriculo,nm_profissao,nr_endereco,nr_cep from profissao as pro, prest_profi as pp, prestador as p where nm_email = '$p' and p.cd_cpf_prestador = pp.cd_cpf_prestador_pp and pp.cd_profissao_pp = pro.cd_profissao";
    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
	$row = $resultado->fetch_assoc();
    $CPF = $row["cd_cpf_prestador"];
    $nome = $row["nm_prestador"];
    $email = $row["nm_email"];
    $profissao = $row["nm_profissao"];
    $CEP = $row["nr_cep"];
    $curriculo = $row["ds_curriculo"];
    $telefone = $row["nr_telefone"];
    $numero = $row["nr_endereco"];
        echo "<div class='container'>";
            echo "<div class='col-md-12'>";
                echo "<label for='imagemPerfil' >Imagem de perfil </label>";
                echo"<br><br>";
                echo "<input type='hidden' name='MAX_FILE_SIZE' value='2000000' />";
                echo "<input type='file' id='idFileUpload' name='userfile' accept='image/png, image/jpg' >";
                echo "<label >Nome</label>";
                echo "<input type = 'text' class='form-control' name = 'nome' value = '$nome'>";
                echo "<br/>";
                echo "<br/>";
                echo "<label >CPF</label>";
                echo "<input type = 'text' class='form-control'  name = 'CPF' value = '$CPF' readonly/>";
                echo "<br/>";
                echo "<label >Email</label>";
                echo "<input type = 'text' class='form-control' name = 'email' value = '$email' >";
                echo "<br/>";
                echo "<br/>";
                echo "<label >Telefone</label>";
                echo "<input type = 'text' class='form-control' name = 'telefone' value = '$telefone' >";
                echo "<br/>";
                echo "<br/>";
    include 'conexao.php';
    $sql = "select cd_profissao, nm_profissao from profissao";
    $resultado = $mysqli->query($sql);
                echo "<div class='col-md-12'>";
                    echo "<label>Profissão</label>";
                    echo "<select id='profissao' name ='profissao' class='form-control'>";
                    echo "<option>$profissao</option>";
    while($row = $resultado->fetch_assoc()) {
                        echo "<option value=".$row["cd_profissao"].">".$row["nm_profissao"]."</option>";
    }                    
	  	
                echo "</select>";
                echo "<br/>";
                echo "<label >CEP</label>";
                echo "<input type = 'text' class='form-control' name = 'CEP' value = '$CEP'>";
                echo "<br/>";
                echo "<br/>";
                echo "<label >Numero</label>";
                echo "<input type = 'text' class='form-control'  name = 'numero' value = '$numero'>";
                echo "<br/>";
                echo "<br/>";    
                echo "<label>Descrição</label>";
                echo "<textarea name='curriculo' class='form-control' rows='10' cols='50'>$curriculo</textarea>";
                echo "<br/>";
                echo "<input type = 'submit' class='btn btn-primary btn-lg pull-right' value='Alterar'/>";
                echo "<input type = 'reset'  class='btn btn-secondary btn-lg pull-right'/>";
            echo "</div>";
        echo "</div>";
}elseif($_SESSION['cod'] == 1){
	$p = $_SESSION['email'];		
	$selecao = "select cd_cpf_cliente, nm_cliente, nm_email,nr_telefone,nr_endereco,nr_cep from cliente where nm_email = '$p' ";
    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
 	$row = $resultado->fetch_assoc();
	$cd = $row["cd_cpf_cliente"];
    $nome = $row["nm_cliente"];
    $email = $row["nm_email"];
    $CEP = $row["nr_cep"];
    $telefone = $row["nr_telefone"];
    $numero = $row["nr_endereco"];	
		echo "<div class='container'>";
    		echo "<div class='col-md-12'>";
        		echo "<label for='imagemPerfil' >Imagem de perfil </label>";
                echo"<br><br>";
                echo "<input type='hidden' name='MAX_FILE_SIZE' value='2000000' />";
                echo "<input type='file' id='idFileUpload' name='userfile' accept='image/png, image/jpg' >";
        		echo "<label >Nome</label>";
                echo "<input type = 'text' class='form-control'";
                echo    " name = 'nome'";
                echo  "value = '$nome'>";
                echo "<br/>";
                echo "<br/>";
                echo "<label >CPF</label>";
                echo "<input type = 'text' class='form-control'";
                echo    " name = 'CPF'";
                echo  "value = '$cd'";
                echo " readonly/>";
                echo "<br/>";
                echo "<label >Email</label>";
                echo "<input type = 'text' class='form-control'";
                echo    " name = 'email'";
                echo  "value = '$email' ";
                echo "<br/>";
                echo "<br/>";
                echo "<label >Telefone</label>";
                echo "<input type = 'text' class='form-control'";
                echo    " name = 'telefone'";
                echo  "value = '$telefone' ";
                echo "<br/>";
                echo "<br/>";
                echo "<label >CEP</label>";
                echo "<input type = 'text' class='form-control'";
                echo    " name = 'CEP'";
                echo  "value = '$CEP'";
                echo "<br/>";
                echo "<br/>";
                echo "<label >Numero</label>";
                echo "<input type = 'text' class='form-control'";
                echo    " name = 'numero'";
                echo  "value = '$numero' ";
                echo "<br/>";
                echo "<br/>";
                echo "<input type = 'submit' class='btn btn-primary btn-lg pull-right' value='Alterar'/>";
                echo "<input type = 'reset' class='btn btn-secondary btn-lg pull-right'/>";
            echo "</div>";
        echo "</div>";
}else{
    echo "erro na sessao";
}
?>
       </p>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    <div class="row"></div>
    </section>

    <!-- About Section --><!-- Contact Section --><!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright SPF Corporation</div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Theme JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-freelancer/3.3.7/js/freelancer.min.js"></script>


</body>

</html>
