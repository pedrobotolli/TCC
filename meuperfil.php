SPF<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Red FON ÉOQ</title>

  
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

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <h1 class="name">spf </h1>
                        <hr class="star-light">
                        <span class="skills">Service Provider Finder - Seu serviço de conexão cliente-trabalhador autonomo</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
                    <h2>Perfil</h2>
              </div>
            <div class="col-lg-12 text-center">
                <form action="alterar.php" method="post">
      <fieldset>
        <legend>Altere seu perfil!</legend>
        <div style="float:left;width:30%;">
          
        </div>
        <div style="float:left;width:70%;">
        <p>
         <?php
         session_start();
         include 'conexao.php';
         $per = $_SESSION['email'];
         $selecao = "select p.cd_cpf_prestador, nm_prestador, nm_email,nr_telefone,ds_curriculo,nm_profissao,nm_rua,nr_casa,nm_bairro,nm_cidade,nm_estado from estado as e,cidade as c,bairro as b,logradouro as l,profissao as pro,prest_profi as pp,prestador as p
         where nm_email = '$per' and p.cd_cpf_prestador = pp.cd_cpf_prestador and pp.cd_profissao = pro.cd_profissao and p.cd_logradouro = l.cd_logradouro and b.cd_bairro = l.cd_bairro and c.cd_cidade = b.cd_cidade and c.sg_estado = e.sg_estado";
         $resultado = $mysqli->query($selecao);
		 $row = $resultado->fetch_assoc();
		 if($row['nm_email'] == $per) 
	 {
         
         $CPF = $row["cd_cpf_prestador"];
         $nome = $row["nm_prestador"];
         $email = $row["nm_email"];
         $profissao = $row["nm_profissao"];
         $rua = $row["nm_rua"];
         $curriculo = $row["ds_curriculo"];
         $telefone = $row["nr_telefone"];
         $bairro = $row["nm_bairro"];
         $cidade = $row["nm_cidade"];
         $estado = $row["nm_estado"];
         $numero = $row["nr_casa"];
         
         
         
         echo "<label >Nome</label>";
          echo "<input type = 'text'";
            echo    " name = 'nome'";
               echo  "value = '$nome'";
               echo " readonly/>";
               
               echo "<label >CPF</label>";
          echo "<input type = 'text'";
            echo    " name = 'CPF'";
               echo  "value = '$CPF'";
               echo " readonly/>";
          echo "<br/>";
          
         echo "<label >Email</label>";
          echo "<input type = 'text'";
            echo    " name = 'email'";
               echo  "value = '$email' ";
               echo "readonly />";
         ?>
             <br/>
             
             <?php
             echo "<label >Telefone</label>";
          echo "<input type = 'text'";
            echo    " name = 'telefone'";
               echo  "value = '$telefone' ";
               echo "readonly />";
             
           echo "<label >Profissao</label>";
          echo "<input type = 'text'";
            echo    " name = 'profissao'";
               echo  "value = '$profissao' ";
               echo "readonly />";
               
               echo "<br/>";
               
               echo "<label >Endereço</label>";
          echo "<input type = 'text'";
            echo    " name = 'endereco'";
               echo  "value = '$rua'";
               echo " readonly />";
               
               echo "<label >Numero</label>";
          echo "<input type = 'text'";
            echo    " name = 'numero'";
               echo  "value = '$numero' ";
            echo "readonly />";
       
         ?>
         <br/>
         <?php
            echo "<label >Bairro</label>";
          echo "<input type = 'text'";
            echo    " name = 'bairro'";
               echo  "value = '$bairro' ";
            echo "readonly />";
               
            echo "<label >Cidade</label>";
          echo "<input type = 'text'";
            echo    " name = 'cidade'";
               echo  "value = '$cidade' ";
            echo "readonly />";
            echo "<br/>";
            echo "<label >Estado</label>";
          echo "<input type = 'text'";
            echo    " name = 'estado'";
               echo  "value = '$estado' ";
            echo "readonly />";
               ?>
         
         <?php
         echo "<br/>";    
         echo "<label>Descrição</label>";
             
               echo "<textarea name='curriculo'";
   echo "rows='10' cols='50' readonly>'$curriculo'</textarea>";
            ?>
           
          
          <br/>
             
          <input type = "submit" value="Alterar"/>
          <input type = "reset" />
        <?php } 
			else{
				
		$selecao = "select cli.cd_cliente, cli.nm_cliente, cli.nm_email,cli.nr_telefone,l.nm_rua,nr_casa,b.nm_bairro,c.nm_cidade,e.nm_estado from estado as e,cidade as c,bairro as b,logradouro as l, cliente as cli
         where nm_email = '$per' and cli.cd_logradouro = l.cd_logradouro and b.cd_bairro = l.cd_bairro and c.cd_cidade = b.cd_cidade and c.sg_estado = e.sg_estado";
        $resultado = $mysqli->query($selecao) or die ($mysqli->error);
     	$row = $resultado->fetch_assoc();		
		$cd = $row["cd_cliente"];
         $nome = $row["nm_cliente"];
         $email = $row["nm_email"];
         $rua = $row["nm_rua"];
         $telefone = $row["nr_telefone"];
         $bairro = $row["nm_bairro"];
         $cidade = $row["nm_cidade"];
         $estado = $row["nm_estado"];
         $numero = $row["nr_casa"];	
				
		echo "<label >Nome</label>";
          echo "<input type = 'text'";
            echo    " name = 'nome'";
               echo  "value = '$nome'";
               echo " readonly/>";
               
          echo "<br/>";
          
         echo "<label >Email</label>";
          echo "<input type = 'text'";
            echo    " name = 'email'";
               echo  "value = '$email' ";
               echo "readonly />";
         ?>
             <br/>
             
             <?php
             echo "<label >Telefone</label>";
          echo "<input type = 'text'";
            echo    " name = 'telefone'";
               echo  "value = '$telefone' ";
               echo "readonly />";

               
               echo "<br/>";
               
               echo "<label >Endereço</label>";
          echo "<input type = 'text'";
            echo    " name = 'endereco'";
               echo  "value = '$rua'";
               echo " readonly />";
               
               echo "<label >Numero</label>";
          echo "<input type = 'text'";
            echo    " name = 'numero'";
               echo  "value = '$numero' ";
            echo "readonly />";
       
         ?>
         <br/>
         <input type = "submit" value="Alterar"/>
          <input type = "reset" />
         <?php               	
				
			}?>
       </p>
        </div>
      
          
      </fieldset>
            
    </form>
        </div>
                </div>
                
          </div>
            <div class="row"></div>
        
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
                        Copyright &copy;Thomas Corporation</div>
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