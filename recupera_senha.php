<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <title>Alterar Senha</title>
    
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
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


<script language="javascript" type="text/javascript">
var forte = false;
var txt="";
function validarSenha(){
	senha1 = document.getElementById("idSenha1").value;
	senha2 = document.getElementById("idSenha2").value;
 
	if (senha1 === senha2){
	    document.getElementById("idForcaSenha").value = txt+", e coincidem";
	    if(forte==true){
	        document.getElementById("botaoVal").disabled = false;
	    }
	}else{
	    document.getElementById("idForcaSenha").value = txt+", e não coincidem";
	}
}
	
	
function verifica(){
	senha1 = document.getElementById("idSenha1").value;
	forca = 0;
	mostra = document.getElementById("mostra");
	if((senha1.length >= 6) && (senha1.length <= 10)){
		forca += 10;
	}else if(senha1.length>10){
		forca += 25;
	}
	if(senha1.match(/[a-z]+/)){
		forca += 15;
	}
	if(senha1.match(/[A-Z]+/)){
		forca += 20;
	}
	if(senha1.match(/[0-9]+/)){
		forca += 20;
	}

	if(senha1.match(/!@#$%¨&*()[]~;:+/)){
		forca += 25;
	}
	return mostra_res();
}

function mostra_res(){
	if(forca < 30){
	    txt="Muito Fraca";
		document.getElementById("idForcaSenha").value = "Muito Fraca";
		forte = false;
		document.getElementById("idSenha2").disabled = true;

	}else if((forca >= 30) && (forca < 60)){
	    txt="Média";
		document.getElementById("idForcaSenha").value = "Média";
        forte = true;
        document.getElementById("idSenha2").disabled = false;
	}else if((forca >= 60) && (forca < 85)){
	    txt="Forte";
		document.getElementById("idForcaSenha").value = "Forte";
        forte = true;
        document.getElementById("idSenha2").disabled = false;
	}else{
	    txt="Muito Forte";
		document.getElementById("idForcaSenha").value = "Muito Forte";
		forte = true;
		document.getElementById("idSenha2").disabled = false;
	}
}	
</script>


   <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php 
                    include("conexao.php");
                    $codigo=$_GET['codigo'];
                    $selecao = "select cd_ativacao,cd_cpf_cliente from cliente where cd_ativacao='". $codigo ."'";
                    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
                    $row = $resultado->fetch_assoc();
                    $cd_res=$row['cd_ativacao'];
                    $cpf=$row['cd_cpf_cliente'];
                    if($codigo == $cd_res)
                    { ?>
                            <h2>alterar Senha</h2><br>
                            <legend>Insira sua nova senha</legend>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <form action="redefinindo_senha.php" method="post">
                        <input type="hidden" name="codigo" value=<?php echo $codigo; ?>>
                        <input type="hidden" name="cpf" value=<?php echo $cpf; ?>>


                        <fieldset>
                            <p>
                                 
        			             <label>Nova Senha: </label>
                                 <input class="form-control" type="password" name="senha" value="">
                  
                                 <label>Confirmar Nova Senha: </label>
                                 <input class="form-control" type="password" name="confsenha" value="">
                            </p>
                            <button class="btn btn-primary" type = "submit">Confirmar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
     <?php 
                
            }   
            else
            {
                    $selecao = "select cd_ativacao,cd_cpf_prestador from prestador where cd_ativacao='". $codigo ."'";
                    $resultado = $mysqli->query($selecao) or die ($mysqli->error);
                    $row = $resultado->fetch_assoc();
                    $cd_res=$row['cd_ativacao'];
                    $cpf=$row['cd_cpf_prestador'];
                    if($codigo == $cd_res)
                    { ?>
                            <h2>Alterar Senha</h2><br>
                            <legend>Insira sua nova senha</legend>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <form action="recuperasenha.php" method="post">
                    <input type="hidden" name="codigo" value=<?php echo $codigo; ?>>
                    <input type="hidden" name="cpf" value=<?php echo $cpf; ?>>
                        <fieldset>
                            <form action="novasenha.php" name="f1" method="post">
                                    <label>Senha:</label> 
                                    <input type="password" class="form-control" name="senha" id="idSenha1" size="20" onkeyup="verifica()">
                                    <br>
                                    <label>Confirmar Senha:</label>
                                    <input type="password" class="form-control" name="confsenha" id="idSenha2" size="20" onkeyup="validarSenha()" disabled>
                                    <br>
                                    <label> Força da Senha:</label>
                                    <input type="text" class="form-control" id="idForcaSenha" value="" name="forcaSenha" disabled>
                                    <br>
                                    <button type="submit" class="btn btn-primary" value="Validar" id="botaoVal" disabled >Alterar Senha</button>
                          
                                </form>
                        </fieldset>
                    </form>
                </div>
            </div>
    <?php   }
            else
            {
                echo "<h1>Algo deu errado!</h1>";
            }
        
        }

    ?>
                
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
                    <p>Equipe SPF </p>
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
