<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mensagens</title>

  
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/freelancer.min.css" rel="stylesheet">


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
                        <a href="#admin">Mensagens</a>
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

 <section id="admin">
        <div class="container">
			<div class="Mensagens">
			<script type= "text/javascript">
				onload= function(){
    			var sel= document.getElementsByName('selectScript')[0];
    			var inp= document.getElementsByName('txtScript')[0];
    			sel.onchange= function(){
        inp.value= sel.value;
    }
}
</script>
				<h1>Mensagens</h1>
			  	<div></div>
       		  <div>
           		
                <div style="float:left;width:30%;">
                  <form action="admin.php" method="post">
                   <?php
					include("conexao.php");
					$consulta="select denuncia.cd_denuncia, cliente.nm_cliente, prestador.nm_prestador from prestador join denuncia join cliente where denuncia.cd_cpf_prestador_d = prestador.cd_cpf_prestador and denuncia.cd_cpf_cliente_d=cliente.cd_cpf_cliente";
                    $resultado = $mysqli->query($consulta) or die ($mysqli->error);
                    $linhas= $mysqli->query($consulta)->num_rows;
                    if($linhas>0){
	                ?>			
	                <input type="submit" value="Abrir">
					<dl>
						<dt><select name="selectScript" size="3">
				<?php		
				while($busca=$resultado->fetch_assoc())
				{ ?>
					
           			    <option value=" <?php echo $busca['cd_denuncia'];?>"><?php echo $busca['nm_cliente'];?> / <?php echo $busca['nm_prestador'];?></option>
				<?php } ?>
				</select></dt>

					</dl>
			
					
					</div>
				</form>
      			<input type= "text" name="txtScript" readonly hidden>
       			<div style="float:right;width:70%;"> 
          			<?php if(isset($_POST['selectScript'])){
							$denuncia = $_POST['selectScript'];
					
						$consulta="select denuncia.ds_denuncia, cliente.nm_cliente, cliente.nm_email, prestador.nm_prestador, prestador.nm_email from prestador join denuncia join cliente where denuncia.cd_cpf_prestador_d = prestador.cd_cpf_prestador and denuncia.cd_cpf_cliente_d=cliente.cd_cpf_cliente and denuncia.cd_denuncia=" . $denuncia;
						$resultado2 = $mysqli->query($consulta) or die ($mysqli->error);

						while($busca2=$resultado2->fetch_assoc()){
							$nomeC= $busca2['nm_cliente'];
							$nomeP= $busca2['nm_prestador'];
							$emailC= $busca2['nm_email'];
							$emailP= $busca2['nm_email'];
							$descricao=$busca2['ds_denuncia'];
						} 
					?>
					
						
						
	
					
           			<p>Nome/Email do Profissional: <input type="text" name="nm_prestador" size="50" disabled value=" <?php echo $nomeP;?> / <?php echo $emailP;?>"><br></p>
					<p>Nome/Email do Cliente: <input type="text" name="nm_cliente" size="50" disabled value="<?php echo $nomeC;?> / <?php echo $emailC;?>"><br></p>
					<p>Mensagem:</p><p><textarea name="mennsagem" rows="10" cols="50" disabled> <?php echo $descricao; ?></textarea></p><br>
       			<?php }
					?>
                 <form action="EmailADM.html">
                 	<input type="submit" value="Enviar Email">
                 </form>
                 <form action="DeletarADM.html">
                 	<input type="submit" value="Deletar">
                 </form>
                  </div>
                  <?php } 
                  else{
                      echo "<h1> Nenhuma denúncia registrada até o momento </h1>";
                  } ?>
       		  </div>
            </div>
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
                        Copyright Corporation</div>
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

