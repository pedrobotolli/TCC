<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPF</title>

  
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

    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
                    <h2>Perfil</h2>
              </div>
            <div class="col-lg-12 text-center">
                <form action="alteracao.php" method="post">
      <fieldset>
        <legend>Altere seu perfil!</legend>
        <div style="width:30%;">
          
        </div>
        <div class="col-lg-12 text-center">
            <p>
            <?php
                session_start();
                include 'conexao.php';
                $CPF = $_POST["CPF"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $profissao = $_POST["profissao"];
                $rua = $_POST["endereco"];
                $curriculo = $_POST["curriculo"];
                $telefone = $_POST["telefone"];
                $bairro = $_POST["bairro"];
                $cidade = $_POST["cidade"];
                $estado = $_POST["estado"];
                $numero = $_POST["numero"];
            ?>
      
         
         
         
                <label >Nome: </label>
                <input type = "text" name="nome" value='<?php echo $nome; ?>'/>
                
               
               <label >CPF: </label>
               <input type = 'text' name = 'CPF' value = '<?php echo $CPF; ?>' />
               
               <br/>
          
               <label >Email: </label>
               <input type = 'text' name = 'email' value = '<?php echo $email; ?>'/>
         
             <br/>
             
             <label >Telefone: </label>
          <input type = 'text' name = 'telefone' value = '<?php echo $telefone;?>'/>
             
            <label >Profissão: </label>
          <input type = 'text' name = 'profissao' value = '<?php echo $profissao;?>'/>
               
               <br/>
               
                <label >Endereço: </label>
          <input type = 'text' name = 'endereco' value = '<?php echo $rua;?>'/>
               
               <label >Número: </label>
          <input type = 'text' name = 'numero' value = '<?php echo $numero;?>'/>
       
         <br/>
        <label>Bairro: </label>
                <?php
    include 'conexao.php';
    $sql3 = "select cd_bairro, nm_bairro from bairro";
    $resultado3 = $mysqli->query($sql3);
    ?>
                <select name="bairro" >
                            
                            <?php
                           echo "<option value=''>$bairro</option>";
    while($row = $resultado3->fetch_assoc()) {
        echo "<option value=".$row["cd_bairro"].">".$row["nm_bairro"]."</option>";
        
    }                    ?>
       		</select> 
             <?php 
             include "conexao.php";
             $sql4 = "select cd_cidade, nm_cidade from cidade";
    $resultado4 = $mysqli->query($sql4);
            echo "<label >Cidade: </label>";
          echo "<select name='cidade' >";
            echo    "<option value=''>$cidade</option>";
              while($row2 = $resultado4->fetch_assoc()) {
        echo "<option value=".$row2["cd_cidade"].">".$row2["nm_cidade"]."</option>";
        
    }
                echo "</select> ";
            echo "<br/>";
            ?>
            
            <?php
    
    

    include 'conexao.php';
    
    $sql1 = "select sg_estado, nm_estado from estado";
    $resultado1 = $mysqli->query($sql1);
    echo "<label >Estado</label>";
                echo "<select name='estado'>";
    echo "<option value=''>$estado</option>";
    while($row = $resultado1->fetch_assoc()) {
        echo "<option value=".$row["sg_estado"].">".$row["nm_estado"]."</option>";
        
    }                    ?>		
    </select>
               
         
         <?php
         echo "<br/>";    
         echo "<label>Descrição</label>";
             
               echo "<textarea name='curriculo'";
   echo "rows='10' cols='50'>$curriculo</textarea>";
            ?>
           
          
          <br/>
             <input type = "submit" value="Salvar"/>
          <input type = "reset" />
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
                        Copyright &copy;Corporation</div>
                </div>
            </div>
        </div>
    </footer>


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
