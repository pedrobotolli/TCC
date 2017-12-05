<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recuperar Senha</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon">


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
                        <a href="cadastrar_cliente.php">Cadastrar Cliente</a>
                    </li>
                    <li>
                        <a href="cadastrando_prestador.php">Cadastrar Prestador</a>
                    </li>
     <li>
                        <a href="recuperasenha.html">Recuperar Senha</a>
                    </li>                </ul>
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

        
        <?php
        include("conexao.php");
        $senha =$_POST['senha'];
        $confsenha =$_POST['confsenha'];
        if($senha==$confsenha)
        {
            $cpf=$_POST['cpf'];
            $selecao = "select cd_cpf_cliente from cliente where cd_cpf_cliente='". $cpf. "'";
             $resultado = $mysqli->query($selecao) or die ($mysqli->error);
             $num=$mysqli->query($selecao)->num_rows;
             if($num > 0)
             {
                 $comando = "update cliente set cd_senha='".$senha."' where cd_cpf_cliente='". $cpf. "'";
                 $resultado = $mysqli->query($comando) or die ($mysqli->error);  
                 $comando = "update cliente set ic_ativo=TRUE where cd_cpf_cliente='". $cpf. "'";
                 $resultado = $mysqli->query($comando) or die ($mysqli->error);  
                 echo "<h3>Senha alterada com sucesso!</h3>";
             }
             else
             {
                 $selecao = "select cd_cpf_prestador from prestador where cd_cpf_prestador='". $cpf. "'";
                 $resultado = $mysqli->query($selecao) or die ($mysqli->error);
                 $num=$mysqli->query($selecao)->num_rows;
                 if($num > 0)
                 {
                     $comando = "update prestador set cd_senha='".$senha."' where cd_cpf_prestador='". $cpf. "'";
                     $resultado = $mysqli->query($comando) or die ($mysqli->error);  
                     $comando = "update prestador set ic_ativo=TRUE where cd_cpf_prestador='". $cpf. "'";
                     $resultado = $mysqli->query($comando) or die ($mysqli->error);  
                     echo "<h3>Senha alterada com sucesso!</h3>";             
                 }
                 else
                 {
                     $url = "recupera_senha.php?codigo=". $_POST['codigo'];
                     ?>
                    <form action=<?php echo $url; ?>>
                        <h1>Informações incorretas, tente novamente</h1>
                        <input type="submit" value="OK" />
                    </form>
        
                <?php 
                } 
            }
        }
             
        
        else
        { $url = "recupera_senha.php?codigo=". $_GET['codigo'];
        ?>
        <form action=<?php echo $url; ?>>
            <h1>Informações incorretas, tente novamente</h1>
            <input type="submit" value="OK" />
        </form>
        
        <?php 
        } ?>

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
                        Copyright &copy; Corporation</div>
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
