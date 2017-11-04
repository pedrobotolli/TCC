<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon" />

    <title>Cadastro de Cliente</title>

  
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
                        <a href="cadastro.php">Cadastrar Cliente</a>
                    </li>
                    <li>
                        <a href="cadastroperfil.php">Cadastrar Prestador</a>
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

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br>
                    <legend><h2>Cadastro de Cliente</h2></legend>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <form action="cadastrar.php" method="post">
            <fieldset>
            <div class = "row justify-content-center">
                <div class="col-lg-4">
                    <label for="imagemPerfil" >Imagem de perfil </label>
                    <br><br>
                    <input type = "file" class="form-control-file" id="imagemPerfil" name="imagem" />
                </div>
                <div class="col-lg-8">
                    <label for="nomeUsuario">Nome</label>
                    <input type = "text" class="form-control" name = "nome" id="nomeUsuario" value = "" />
                    <br>
                    <label for="cpfUsuario">CPF</label>
                    <input type = "text" class="form-control" name = "CPF" id="cpfUsuario" value = "" />
                </div>
            </div>
            <div class="row justify-content-center">                
                <div class="col-lg-12">    
                    <br>
                    <label for="emailUsuario">Email</label>
                    <input type = "text" class="form-control" name = "email" id="emailUsuario" value = "" />
                    <br>
                    <label>CEP</label>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input type = "text" class="form-control" name = "endereco" value = "">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary">Verificar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label>Numero</label>
                    <input type = "text" class="form-control" name = "numero" value = "">
                    <br>
                    <label>Telefone</label>
                    <input type = "text" class="form-control" name = "telefone" value = "">
                    <br>
                    <button type = "reset" class="btn btn-secondary pull-right">Redefinir</button>
                    <button type = "submit" class="btn btn-primary pull-right">Enviar</button>
                </div>
            </div>
            </fieldset>
            </form>
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
                        <p>Service Provider Finder é uma ferramenta gratuita que ajuda pessoas a acharem um profissional para ajudá-lass</p>
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
