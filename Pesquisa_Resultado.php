<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resultado da pesquisa</title>


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
                <a class="navbar-brand" href="#page-top">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
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
<h1>Resultado da pesquisa</h1>
<?php 
session_start();

include("conexao.php");
$r=1;
if(isset($_GET['pagina'])){
$pagina=intval($_GET['pagina']);}
	else{
			
		$pagina=0;
	}
$itens_por_pagina=10;
if (isset($_GET["pesquisa"]) and isset($_GET["escolha"]) and ($_GET["pesquisa"]!=""))
{
$pesquisa=$_GET["pesquisa"];	
$escolha=$_GET["escolha"];
	
if($escolha=='Profissao'){
$consulta="select cd_profissao from profissao where nm_profissao like '%". $pesquisa ."%'";
$resultado = $mysqli->query($consulta) or die ($mysqli->error);
$linhas= $mysqli->query($consulta)->num_rows;
if($linhas>0){
$pessoa=array();
$email=array();
$num_total=0;
$num=0;
while($busca=$resultado->fetch_assoc()){
$sql="select prestador.nm_prestador from prest_profi join prestador on prestador.cd_cpf_prestador=prest_profi.cd_cpf_prestador where cd_profissao=". $busca['cd_profissao'];
$query = $mysqli->query($sql) or die ($mysqli->error);
$num_total+=$mysqli->query($sql)->num_rows;
$sql="select prestador.nm_prestador from prest_profi join prestador on prestador.cd_cpf_prestador=prest_profi.cd_cpf_prestador where cd_profissao=". $busca['cd_profissao']. " LIMIT ". $pagina ."," .$itens_por_pagina;
$query = $mysqli->query($sql) or die ($mysqli->error);
$num+=$mysqli->query($sql)->num_rows;
while($busca2=$query->fetch_assoc()){
	$pessoa[]=$busca2;
}
$sql2="select prestador.nm_email from prest_profi join prestador on prestador.cd_cpf_prestador=prest_profi.cd_cpf_prestador where cd_profissao=". $busca['cd_profissao']. " LIMIT ". $pagina ."," .$itens_por_pagina;
$query2 = $mysqli->query($sql2) or die ($mysqli->error);
while($busca3=$query2->fetch_assoc()){
	$email[]=$busca3;
}
	
}
$num_paginas = ceil($num_total/$itens_por_pagina);
}
	else{
		echo"Nenhum resultado";
		$r=0;
		$num = 0;
		$num_total=0;
		$num_paginas = 0;
	}
}
	
elseif($escolha=='Logradouro'){
$consulta="select cd_logradouro from logradouro where nm_rua like '%". $pesquisa ."%'";
$resultado = $mysqli->query($consulta) or die ($mysqli->error);
$linhas= $mysqli->query($consulta)->num_rows;
if($linhas>0){
$pessoa=array();
$email=array();
$num_total=0;
$num=0;
while($busca=$resultado->fetch_assoc()){
$sql="select prestador.nm_prestador from prestador join logradouro on prestador.cd_logradouro=logradouro.cd_logradouro where prestador.cd_logradouro=". $busca['cd_logradouro']; 
$query = $mysqli->query($sql) or die ($mysqli->error);
$num_total+=$mysqli->query($sql)->num_rows;
$sql="select prestador.nm_prestador from prestador join logradouro on prestador.cd_logradouro=logradouro.cd_logradouro where prestador.cd_logradouro=". $busca['cd_logradouro']. " LIMIT ". $pagina ."," .$itens_por_pagina; 
$query = $mysqli->query($sql) or die ($mysqli->error);
$num+=$mysqli->query($sql)->num_rows;
while($busca2=$query->fetch_assoc()){
	$pessoa[]=$busca2;
}
$sql2="select prestador.nm_email from prestador join logradouro on prestador.cd_logradouro=logradouro.cd_logradouro where prestador.cd_logradouro=". $busca['cd_logradouro'];
$query2 = $mysqli->query($sql2) or die ($mysqli->error);
while($busca3=$query2->fetch_assoc()){
	$email[]=$busca3;
}
}

$num_paginas = ceil($num_total/$itens_por_pagina);
}
	else{
		echo"Nenhum resultado";
		$r=0;
		$num = 0;
		$num_total=0;
		$num_paginas = 0;
	}
}
elseif($escolha=='Nome'){
$consulta="select nm_prestador from prestador where nm_prestador like '%". $pesquisa ."%'";
$resultado = $mysqli->query($consulta) or die ($mysqli->error);
$linhas= $mysqli->query($consulta)->num_rows;
if($linhas>0){
$pessoa=array();
$email=array();
$num_total=$linhas;
$consulta="select nm_prestador from prestador where nm_prestador like '%". $pesquisa ."%' LIMIT ". $pagina ."," .$itens_por_pagina;
$resultado = $mysqli->query($consulta) or die ($mysqli->error);
$num=$mysqli->query($consulta)->num_rows;
while($busca=$resultado->fetch_assoc()){
$pessoa[]=$busca;
}	
	
$consulta="select nm_email from prestador where nm_prestador like '%". $pesquisa ."%' LIMIT ". $pagina ."," .$itens_por_pagina;
$resultado = $mysqli->query($consulta) or die ($mysqli->error);
while($busca=$resultado->fetch_assoc()){
$email[]=$busca;
}	
	
$num_paginas = ceil($num_total/$itens_por_pagina);
}
	else{
		echo"Nenhum resultado";
		$r=0;
		$num = 0;
		$num_total=0;
		$num_paginas = 0;
	}
}	
elseif($escolha=='Cliente'){
$consulta="select nm_cliente from cliente where nm_cliente like '%". $pesquisa ."%'";
$resultado = $mysqli->query($consulta) or die ($mysqli->error);
$linhas= $mysqli->query($consulta)->num_rows;
if($linhas>0){
$num_total=$linhas;
$pessoa=array();
$email=array();
$consulta="select nm_cliente from cliente where nm_cliente like '%". $pesquisa ."%' LIMIT ". $pagina ."," .$itens_por_pagina;
$resultado = $mysqli->query($consulta) or die ($mysqli->error);
$num=$mysqli->query($consulta)->num_rows;
while($busca=$resultado->fetch_assoc()){
$pessoa[]=$busca;
}
	
$consulta="select nm_email from cliente where nm_cliente like '%". $pesquisa ."%' LIMIT ". $pagina ."," .$itens_por_pagina;
$resultado = $mysqli->query($consulta) or die ($mysqli->error);	
while($busca=$resultado->fetch_assoc()){
$email[]=$busca;
}	

$num_paginas = ceil($num_total/$itens_por_pagina);
}
	else{
		echo"Nenhum resultado";
		$r=0;
		$num = 0;
		$num_total=0;
		$num_paginas = 0;
	}

}elseif($escolha=='Indicacao'){
    $consul="select cd_cpf_prestador from indicacao";
    $result = $mysqli->query($consul) or die ($mysqli->error);
    $consulta = "select nm_email,nm_prestador from prestador where cd_cpf_prestador = '$result' LIMIT" .$pagina.",".$itens_por_pagina;
    $resultado = $mysqli->query($consulta) or die ($mysqli->error);
    $linhas= $mysqli->query($resultado)->num_rows;
    if($linhas>0){
        
        $num_total=$linhas;
        $pessoa=array();
        $email=array();
        while($busca=$resultado->fetch_assoc()){
            $pessoa[]=$busca['nm_prestador'];
            $email[]=$busca['nm_email'];
}
$num_paginas = ceil($num_total/$itens_por_pagina);
}else{
		echo"Nenhum resultado";
		$r=0;
		$num = 0;
		$num_total=0;
		$num_paginas = 0;
	}
}
?>


    <!-- Header -->
    <!-- Portfolio Grid Section -->
<section id="portfolio">
        <div class="container">
			<div class="Mensagens">
			  
			<div class="container-fluid">
		  		<div class="row">
			  		<div class="resultado_pesquisa">
						<?php if (($num >= 0) and ($r > 0)){ ?>
						<table class="table table-bordered">
							<thead>
							<tr>
								<td>Nome</td>
							</tr>
								
							</thead>
							<tbody>
								<?php 
									$cont=0;
									foreach($pessoa as $index => $p){
									
									foreach($p as $i => $elemento){
									$e=$email[$cont];
									$el=$e['nm_email'];
								?>
								<tr>
									<td><a href="perfil.php?perfil=<?php echo $el; ?>"><?php echo $elemento ?></a></td>
								</tr>
								<?php $cont++; }}?>
							</tbody>
							
						</table>				
	<nav aria-label="Page navigation">
  		<ul class="pagination">
    		<li class="page-item">
      			<a class="page-link" href="Pesquisa_Resultado.php?<?php echo "pagina=0&escolha=". $escolha ."&pesquisa=". $pesquisa; ?>" aria-label="Previous">
        			<span aria-hidden="true">&laquo;</span>
        			<span class="sr-only">Previous</span>
      			</a>
    		</li>
    		<?php
			for($i=0;$i<$num_paginas;$i++){ 
			
			$estilo="";
			if($pagina == $i)
				$estilo= "class=\"active\"";
			?>
    		<li <?php echo $estilo; ?>class="page-item"><a class="page-link" href="Pesquisa_Resultado.php?<?php echo "pagina=". $i ."&escolha=". $escolha ."&pesquisa=". $pesquisa; ?>"><?php echo $i+1; ?></a></li>
    		<?php } $limite=$num_paginas-1; ?>
    		<li class="page-item">
      			<a class="page-link" href="Pesquisa_Resultado.php?pagina=<?php echo $limite ."&escolha=". $escolha ."&pesquisa=". $pesquisa; ?>" aria-label="Next">
        			<span aria-hidden="true">&raquo;</span>
        			<span class="sr-only">Next</span>
      			</a>
    		</li>
  		</ul>
	</nav>
						
						<?php 

}
						
					else{
						?>
						<section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
              <div class="col-lg-12 text-center">
      <fieldset>
        <h2>Nenhum resultado encontrado</h2>

       

      </fieldset>
        
                </div>
                
          </div>
            <div class="row"></div>
        </div>
    </section>
					<?php } 
	
						}
						else{
						?>
						<section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
              <div class="col-lg-12 text-center">
      <fieldset>
        <h2>Nenhum resultado encontrado</h2>

       

      </fieldset>
        
                </div>
                
          </div>
            <div class="row"></div>
        </div>
    </section>
					<?php } ?>
 						
					</div>
				</div>
			</div>
				<nav aria-label="Page navigation">
</nav>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <!-- Contact Section -->
    <!-- Footer -->
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
                        <p>Service Provider Finder é uma ferramenta gratuita que ajuda pessoas a acharem um profissional para ajudá-las </p>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button id="btnSubmit" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
