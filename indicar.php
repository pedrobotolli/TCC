<!DOCTYPE html>
<html lang="pt-br">

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

 <section id="admin">
        <div class="container">
			<div class="Email">

				<h1>Indicação</h1>
			  	<div></div>
       		  <div>

                <div style="float:left;width:30%;">
                
                <?php session_start();
                  $emailPRES=$_POST['email'];
                  
                
                ?>
					<form name ="Indicar" action="Enviar_Indicacao.php" method="post">
					<br></p>
					<p>Descreva o porque da Indicação:</p><p><textarea name="mensagem" rows="10" cols="50"></textarea></p><br>
                    <label >Quem recebera Indicação</label></br>
                    <input type="text" id='emailIn' name='emailIn' value=''/>
                 	<input type="submit"  class='btn btn-primary btn-lg pull-right' value="Enviar">
                    <input type="hidden" id='emailprest' name='emailprest' value=<?php echo $emailPRES; ?>>

                 </form>
                  </div>
       		  </div>
            </div>
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
