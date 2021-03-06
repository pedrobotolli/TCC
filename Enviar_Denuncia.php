<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon" />
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
                        <a href="busca.php">Busca</a>
                    </li>
                    <li>
                        <a href="meuperfil.php">Perfil</a>
                    </li>
                    <li>
                        <a href="deslogar.php">Deslogar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header --><!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
              <div class="col-lg-12 text-center">
      <fieldset>

        <p>
<?php
session_start();
include("conexao.php");
$selecao = "select cd_denuncia from denuncia";
$resultado = $mysqli->query($selecao) or die ($mysqli->error);
$cd_denuncia = 0;
while($row = $resultado->fetch_assoc()){
	$cd_denuncia=$row['cd_denuncia'];
}
$cd_denuncia++;
$email=$_POST['emaild'];
$usuario=$_SESSION['cpf'];
$codigo =$_SESSION['cod'];
if($codigo==2)
{
	$cd_cpf_prestador=$usuario;
	$selecao="select cd_cpf_cliente from cliente where nm_email='.$email.'";
	$resultado = $mysqli->query($selecao) or die ($mysqli->error);
	$row = $resultado->fetch_assoc();
	$cd_cpf_cliente=$row['cd_cpf_cliente'];
	$dt_denuncia=date('Y-m-d');
    $ds_denuncia=$_POST['mensagem'];
    $sql1 = "INSERT INTO denuncia (cd_denuncia, ds_denuncia, dt_denuncia, cd_cpf_cliente,cd_cpf_prestador) VALUES ";
    $sql1 .= "('$cd_denuncia','$ds_denuncia','$dt_denuncia','$cd_cpf_cliente','$cd_cpf_prestador')";
    if($mysqli->query($sql1)===TRUE)
    {
        echo 'Denúncia Registrada com sucesso!';

    }
    else
    {
        echo 'ERRO: ' . $sql1 . '<br>' . $mysqli->error;
    }
}
else
{
	$cd_cpf_cliente=$usuario;
	$selecao="select cd_cpf_prestador from prestador where nm_email='$email'";
	$resultado = $mysqli->query($selecao) or die ($mysqli->error);
	$row = $resultado->fetch_assoc();
	$cd_cpf_prestador=$row['cd_cpf_prestador'];
    $dt_denuncia=date('Y-m-d');
    $ds_denuncia=$_POST['mensagem'];
    $sql1 = "INSERT INTO denuncia (cd_denuncia, ds_denuncia, dt_denuncia, cd_cpf_cliente,cd_cpf_prestador) VALUES ";
    $sql1 .= "('$cd_denuncia','$ds_denuncia','$dt_denuncia','$cd_cpf_cliente','$cd_cpf_prestador')";
    if($mysqli->query($sql1)===TRUE)
    {
        echo 'Denúncia Registrada com sucesso!';

    }
    else
    {
        echo 'ERRO: ' . $sql1 . '<br>' . $mysqli->error;

    }
}
?>
        </p>

      </fieldset>

                </div>

          </div>
            <div class="row"></div>
        </div>
    </section>

    <!-- About Section --><!-- Contact Section --><!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy;Corporation</div>
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

</html>
