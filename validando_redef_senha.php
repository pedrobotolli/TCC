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
include("conexao.php");
    $tamanho = 10;
    $consoantes = 'bcfg';
    $vogais = 'aeiou';
    $password= '';
    $alt = time() % 2;
    for ($i = 0; $i < $tamanho; $i++) {
        if ($alt == 1) {
            $password .= $consoantes[(rand() % strlen($consoantes))];
            $alt = 0;
           
        } else {
            $password .= $vogais[(rand() % strlen($vogais))];
            $alt = 1;
           
        }
    }
$aux = $user.time(); 
$codigo = substr(md5($aux),0,10);
$email=$_GET['email'];
$cpf=$_GET['cpf'];
$selecao = "select cd_cpf_cliente, nm_email, nm_cliente from cliente where nm_email='". $email ."' and cd_cpf_cliente='". $cpf ."'";
$resultado = $mysqli->query($selecao) or die ($mysqli->error);
$num=$mysqli->query($selecao)->num_rows;
if($num > 0)
{
    
    $res = $resultado->fetch_assoc();
    $nome = $res['nm_cliente'];
    $selecao = "update cliente set cd_ativacao='".$codigo."' where nm_email='". $email ."' and cd_cpf_cliente='". $cpf ."'";
    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
    require 'vendor/autoload.php';
    $dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
    $dotenv->load();
    $from = new SendGrid\Email("Equipe SPF", "naoresponda@serviceproviderfinder.com");
    $subject = "Recuperação de Senha";
    $to = new SendGrid\Email("Usuário", $email);
    $content = new SendGrid\Content("text/html", "<p style='font-family: Arial, Helvetica, sans-serif;color:#000080;'>Caro Sr(a) ". $nome .", </p> <br /> <p style='font-family: Arial, Helvetica, sans-serif;color:#000080;'> Recebemos sua solicitação de recuperação de senha, <a href='http://tcc-spf-pedrobotolli.c9users.io/recupera_senha.php?codigo=". $codigo .">clique aqui para redefinir sua senha</a>.</p>");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    
    //usando o  getenv
    $apiKey = getenv('SENDGRID_API_KEY');
    
    
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    print_r($response->headers());
    echo $response->body();
    echo "<h3>Enviamos um e-mail para que seja feita a alteração da senha</h3>";
}
else 
{
    $selecao = "select cd_cpf_prestador, nm_email, nm_prestador from prestador where nm_email='". $email ."' and cd_cpf_prestador='". $cpf ."'";
    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
    $num=$mysqli->query($selecao)->num_rows;
    if($num > 0)
    {
        $res = $resultado->fetch_assoc();
        $nome = $res['nm_cliente'];
        $selecao = "update cliente set cd_ativacao='".$codigo."' where nm_email='". $email ."' and cd_cpf_cliente='". $cpf ."'";
        $resultado = $mysqli->query($selecao) or die ($mysqli->error);
        require 'vendor/autoload.php';
        $dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
        $dotenv->load();
        $from = new SendGrid\Email("Equipe SPF", "naoresponda@serviceproviderfinder.com");
        $subject = "Recuperação de Senha";
        $to = new SendGrid\Email("Usuário", $email);
        $content = new SendGrid\Content("text/html", "<p style='font-family: Arial, Helvetica, sans-serif;color:#000080;'>Caro Sr(a) ". $nome .", </p> <br /> <p style='font-family: Arial, Helvetica, sans-serif;color:#000080;'> Recebemos sua solicitação de recuperação de senha, <a href='http://tcc-spf-pedrobotolli.c9users.io/recupera_senha.php?codigo=". $codigo .">clique aqui para redefinir sua senha</a>.</p>");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //usando o  getenv
        $apiKey = getenv('SENDGRID_API_KEY');
        
        
        $sg = new \SendGrid($apiKey);
        $response = $sg->client->mail()->send()->post($mail);
        echo $response->statusCode();
        print_r($response->headers());
        echo $response->body();
        echo "<h3>Enviamos um e-mail para que seja feita a alteração da senha</h3>";
    }
    else
    {

?>
    <form action="recuperasenha.html">
        <h1>Informações incorretas, tente novamente</h1>
        <input type="submit" value="OK" />
    </form>
<?php 
        
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
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                    <h3>Criadores</h3>
                    <p>Equipe SPF</p>
                  </div>
                    <div class="footer-col col-md-4">
                      <h3>Sobre o SPF</h3>
                        <p>Service Provider Finder é uma ferramenta gratuita que ajuda pessoas a acharem um profissional para ajudá-las</p>
                    </div>
                </div>
            </div>
        </div>
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
