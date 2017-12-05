<?php namespace SendGrid; 
require '/home/ubuntu/workspace/vendor/autoload.php';

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <title>SPF</title>

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
                    <span class="sr-only">Toggle navigation</span> Menu
                </button>
                <a class="navbar-brand" href="index.html">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
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

function helloEmail()
{
    
    session_start();
    include 'conexao.php';
    if($_SESSION['cod']==1){
    $emailp=$_POST['email'];
    $emailc=$_SESSION['email'];
    $assunto="Um cliente está interessado em seu serviço!";
    		
    $selecao = "select nm_cliente,nr_telefone from cliente where nm_email='$emailc'";
    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
    $row = $resultado->fetch_assoc();
    $nomec=$row['nm_cliente'];	
    $telefonec=$row['nr_telefone'];			
    $selecao = "select nm_prestador,nr_telefone from prestador where nm_email='$emailp'";
    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
    $row = $resultado->fetch_assoc();
    $nomep=$row['nm_prestador'];		
    $telefonep=$row['nr_telefone'];			
    $from = new Email(null, "naoresponda@spf.com");
    $subject = $assunto;
    $to = new Email(null, $emailp);
    $content = new Content("text/plain", "Olá sr.(a) '$nomep', o cliente '$nomec' está interessado em seus serviços, entre em contato através do email '$emailc' ou através do telefone '$telefonec' para negociar os termos do contrato. A equipe do Service Provider Finder lhe deseja uma boa sorte com o serviço.");
    $mail = new Mail($from, $subject, $to, $content);
    $to = new Email(null, "naoresponda@spf.com");
    $mail->personalization[0]->addTo($to);
    
    
    }
    else{
        $emailc=$_POST['email'];
        $emailp=$_SESSION['email'];
        $assunto="Um prestador está lhe oferecendo um serviço";
        		
        $selecao = "select nm_cliente,nr_telefone from cliente where nm_email='$emailc'";
        $resultado = $mysqli->query($selecao) or die ($mysqli->error);
        $row = $resultado->fetch_assoc();
        $nomec=$row['nm_cliente'];	
        $telefonec=$row['nr_telefone'];			
        $selecao = "select nm_prestador,nr_telefone from prestador where nm_email='$emailp'";
        $resultado = $mysqli->query($selecao) or die ($mysqli->error);
        $row = $resultado->fetch_assoc();
        $nomep=$row['nm_prestador'];
        $telefonep=$row['nr_telefone'];			
        $from = new Email(null, "naoresponda@spf.com");
        $subject = $assunto;
        $to = new Email(null, $emailc);
        $content = new Content("text/plain", "Olá sr.(a) '$nomec', o prestador '$nomep' está lhe oferecendo serviço, entre em contato através do email '$emailp' ou através do telefone '$telefonep' para negociar os termos do contrato. A equipe do Service Provider Finder lhe deseja uma boa sorte com o serviço.");
        $mail = new Mail($from, $subject, $to, $content);
        $to = new Email(null, "naoresponda@spf.com");
        $mail->personalization[0]->addTo($to);
        
        
    }
    
    return $mail;
}
function sendHelloEmail()
{
    
    $sg = new \SendGrid("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");
    $request_body = helloEmail();
    $response = $sg->client->mail()->send()->post($request_body);
}
sendHelloEmail();  // this will actually send an email

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
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        Copyright SPF Corporation</div>
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
