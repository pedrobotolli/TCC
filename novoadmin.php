<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <title>Admin</title>

    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">


    
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
    <script>
        function banir(codigo){
            
            $.ajax({
               type: "POST",
               url: 'ademir.php',
               data:{ cpf: codigo // will be accessible in $_POST['cpf']
               },
               success:function() {
               }
            
            });
    
        }
    </script>


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
                        <a href="#admin">Denuncias</a>
                    </li>
                    <li>
                        <a href="busca.php">Busca</a>
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
            <div class="row text-center">
                <h2>Denúncias
                <legend>
            </div>
            
            <div class="col-md-8 col-md-offset-2 table-responsive">  
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nome do Prestador</td>
                            <td>Data da Denúncia</td>
                            <td>Descrição da Denúncias</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'conexao.php';
                        $selecao = "select * from denuncia";
                        $resultado = $mysqli->query($selecao) or die ($mysqli->error);
                        
                        if (mysqli_num_rows($resultado) > 0) {
                            while($row = $resultado->fetch_assoc()) {
                                $selecao2 = "select nm_prestador from prestador where cd_cpf_prestador =".$row["cd_cpf_prestador"];
                                $resultado2 = $mysqli->query($selecao2) or die ($mysqli->error);
                                
                                if (mysqli_num_rows($resultado2) > 0) {
                                    $row2 = ($row2 = $resultado2->fetch_assoc());
                                    echo "<tr id='".$row["cd_denuncia"]."'>";
                                    echo    "<td>".$row2["nm_prestador"]."</td>";
                                    echo    "<td>".$row["dt_denuncia"]."</td>";
                                    echo    "<td>".$row["ds_denuncia"]."</td>";
                                    echo    "<td><buttom type='buttom' onclick='banir('".$row["cd_cpf_prestador"]."')'  class='btn btn-danger' >Banir</td>"; 
                                    echo "</tr>";
                                }else{
                                    echo "<tr id='".$row["cd_denuncia"]."'>";
                                    echo    "<td>".$row["cd_cpf_prestador"]."</td>";
                                    echo    "<td>".$row["dt_denuncia"]."</td>";
                                    echo    "<td>".$row["ds_denuncia"]."</td>";
                                    echo    "<td><buttom type='buttom' onclick=''  class='btn btn-danger' >Banir</td>"; 
                                    echo "</tr>";
                                }
                            }
                        } else {
                            echo "nenhum resultado";
                        }
                        
                        ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </section>          
              





    <!-- About Section --><!-- Contact Section --><!-- Footer -->
    <footer class="text-center">
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

