SPFSPFSPFSPFSPF<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>busca</title>

  
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/freelancer.css" rel="stylesheet">


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
                    <li class="page-scroll">
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
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
include 'conexao.php';
$emailp=$_POST['email'];
$emailc=$_SESSION['email'];
$assunto="Um cliente está interessado em seu serviço!";
			
$selecao = "select nm_cliente,nr_telefone from cliente where nm_email='$emailc'";
$resultado = $mysqli->query($selecao) or die ($mysqli->error);
$row = $resultado->fetch_assoc();
$nomec=$row['nm_cliente'];	
$telefonec=$row['nr_telefone'];			
$selecao = "select nm_prestador from prestador where nm_prestador='$emailp'";
$resultado = $mysqli->query($selecao) or die ($mysqli->error);
$row = $resultado->fetch_assoc();
$nomep=$row['nm_prestador'];			

$mensagem="Olá sr.(a) '$nomep', o cliente '$nomec' está interessado em seu serviço, entre em contato através do email '$emailc' ou através do telefone '$telefonec' para negociar os termos do contrato. A equipe do Service Provider Finder lhe deseja uma boa sorte com o serviço.";
            
            $dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
            $dotenv->load();
            
            $from = new SendGrid\Email("Equipe SPF", "naoresponda@serviceproviderfinder.com");
            $subject = "Um usuário do SPF está interessado em seu trabalho";
            $to = new SendGrid\Email($nomep , $emailp);
            $content = new SendGrid\Content("text/html", "<p>Olá sr.(a) ". $nomep ."</p> <p>Um cliente se interessou pelos seus serviços, segue abaixo as informações de contato:</p> <p> Nome: ". $nomec. "</p> <p>Telefone: ".$telefonec."</p> E-mail: ".$emailc."</p> <p>Esperamos que tenha sucesso com o novo cliente</p> <p>Equipe SPF</p>" );
            $mail = new SendGrid\Mail($from, $subject, $to, $content);
            
            //usando o  getenv
            $apiKey = getenv('SENDGRID_API_KEY');
            
            
            $sg = new \SendGrid($apiKey);
            $response = $sg->client->mail()->send()->post($mail);
            echo $response->statusCode();
            print_r($response->headers());
            echo $response->body();
?>
       <h3>Prestador Solicitado com sucesso</h3>
        </p>

      </fieldset>
        
                </div>
                
          </div>
            <div class="row"></div>
        </div>
    </section>

    <!-- About Section --><!-- Contact Section --><!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                    <h3>Criadores</h3>
                    <p>Equipe SPF</p>
                  </div>
                    <div class="footer-col col-md-4">
                      <h3>Sobre o SPF</h3>
                        <p>Service Provider Finder � uma ferramenta gratuita que ajuda pessoas a acharem um profissional para ajud�-las</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy;Thomas Corporation</div>
                </div>
            </div>
        </div>
    </footer>









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
