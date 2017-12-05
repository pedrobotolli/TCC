<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon" />
    <title>Perfil</title>

    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		float:center;
		width: 100%;
        height: 400px;
      }
      /* Optional: Makes the sample page fill the window.
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }*/
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>

    <script LANGUAGE="JavaScript">
       function Denunciar()
       {
         document.formulario.action="denunciar.php";
         document.forms.formulario.submit();
       }
      </script>
      <script LANGUAGE="JavaScript">
       function SolicitarServico()
       {
         document.formulario.action="solicitar_servico.php";
         document.forms.formulario.submit();
       }
      </script>
      <script LANGUAGE="JavaScript">
       function Indicar()
       {
         document.formulario.action="indicar.php";
         document.forms.formulario.submit();
       }
      </script>
      <script LANGUAGE="JavaScript">
       function Avaliar()
       {
         document.formulario.action="avaliacao.php";
         document.forms.formulario.submit();
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

   
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
                    <h2>Perfil</h2>
                    <legend></legend>
                    <br>
            </div>
            <div id="map"></div>
            <div class="col-lg-12">

      <fieldset>
        <div style="float:left;width:30%;">
        </div>
		<div style="float:left;width:70%;">
        <p>
         <?php

         include 'conexao.php';
         $per = $_GET['perfil'];
         
         $selecao = "select nm_email from prestador where nm_email = '$per' ";
         $resultado = $mysqli->query($selecao) or die ($mysqli->error);
         $row = $resultado->fetch_assoc();
         $emailprest=$row["nm_email"];
         $profi = "select nm_profissao from prestador as pre, profissao as p, prest_profi as pp where pp.cd_cpf_prestador_pp = pre.cd_cpf_prestador and pp.cd_profissao_pp = p.cd_profissao";
         $rpro = $mysqli->query($profi) or die ($mysqli->error);
         $rowpro = $rpro->fetch_assoc();
         $profissao = $rowpro["nm_profissao"];
         
		if($per == $emailprest){
		 $selecao = "select cd_cpf_prestador, nm_prestador, nm_email,nr_telefone,ds_curriculo,nr_cep,nr_endereco from prestador where nm_email = '$per' ";
         $resultado = $mysqli->query($selecao) or die ($mysqli->error);
         $row = $resultado->fetch_assoc();
         $CPF = $row["cd_cpf_prestador"];
         $nome = $row["nm_prestador"];
         $email = $row["nm_email"];
         $curriculo = $row["ds_curriculo"];
         $telefone = $row["nr_telefone"];
         $numero = $row["nr_endereco"];
         $CEP = $row["nr_cep"];
         $curriculo = $row["ds_curriculo"];
		 
		 
        echo "<form method='post' name='formulario'>";
        
        echo "<div class='container'>";
        echo "<img src='/uploads/P-".$CPF.".jpg' width='150' height='150'>" ;
        echo "<div class='col-md-12'>";
         echo "<label >Nome</label>";
          echo "<input type = 'text' class='form-control'";
            echo    " name = 'nome'";
               echo  "value = '$nome'";
               echo " readonly/>";
                echo" <br/>";
                
    ?>
    <input type="hidden" id='CPF' name='CPF' value=<?php echo $CPF; ?>>
      <?php  echo "<div class='col-md-12'>";
         echo "<label >Email</label>";
          echo "<input type = 'text' class='form-control'";
            echo    " name = 'email'";
               echo  "value = '$email' ";
               echo "readonly />";
         ?>
             <br/>

             <?php
             echo "<label >Telefone</label>";
          echo "<input type = 'text' class='form-control'";
            echo    " name = 'telefone'";
               echo  "value = '$telefone' ";
               echo "readonly />";
               echo" <br/>";
               echo "</div>";
                
            echo "<div class='col-md-12'><label >Profissao</label><input type = 'text' class='form-control'name = 'profissao' value = '$profissao' readonly />";

               echo "<br/>";

               echo "<label >CEP</label>";
          echo "<input type = 'text' class='form-control'";
            echo    " name = 'endereco'";
               echo  "value = '$CEP'";
               echo " readonly />";
               echo" <br/>";
            echo "</div>";
            
            echo "<div class='col-md-12'>";
               echo "<label >Numero</label>";
          echo "<input type = 'text' class='form-control'";
            echo    " name = 'numero'";
               echo  "value = '$numero' ";
            echo "readonly />";
            
         
         echo "<br/>";
         echo "<label>Descrição</label>";

               echo "<textarea name='curriculo' class='form-control'";
   echo "rows='10' cols='50' readonly>$curriculo</textarea> <br/>";
			/*echo "Avaliações: <textarea name='curriculo'";
   echo "rows='10' cols='50' readonly>";
			for($cont=0;$cont<count($avaliacao);$cont++){
			echo "Nome: ". $nome[$cont] ."   Nota: ". $nota[$cont] ." ";
			echo $avaliacao[$cont] ." ";
			}
			echo "</textarea> <br/>";*/
			echo "</div>";
        echo "</div>";
      echo"<input type='submit' class='btn btn-primary btn-lg pull-right' onclick='SolicitarServico()' value='Solicitar Serviço'/>";
      
      echo"<input type='submit' class='btn btn-primary btn-lg pull-right' onclick='Denunciar()' value='Denunciar'/>";
      
      echo"<input type='submit' class='btn btn-primary btn-lg pull-right' onclick='Indicar()' value='Indicar'/>";
      if($_SESSION['cod']==1){
      echo"<input type='submit' class='btn btn-primary btn-lg pull-right' onclick='Avaliar()' value='Avaliar'/>";
      }

      echo"</form>";
      
      	$consulta="select c.nm_cliente, a.ds_avaliacao, c.cd_cpf_cliente, a.dt_avaliacao from cliente c join avaliacao a where c.cd_cpf_cliente = a.cd_cpf_cliente and a.cd_cpf_prestador=".$CPF;
        $resultado = $mysqli->query($consulta) or die ($mysqli->error);
        $linhas= $mysqli->query($consulta)->num_rows;
        if($linhas>0){
        $res= $mysqli->query($consulta);
        while($comentario=$res->fetch_assoc()){
      ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Comentários</h3>
                </div><!-- /col-sm-12 -->
            </div><!-- /row -->
            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="/uploads/C-<?php echo $comentario['cd_cpf_cliente']; ?>".jpg">
                    </div><!-- /thumbnail -->
                </div><!-- /col-sm-1 -->
                
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><?php echo $comentario['nm_cliente']; ?></strong> <span class="text-muted">Enviado em <?php echo $comentario['dt_avaliacao']; ?></span>
                    </div>
                    <div class="panel-body">
                        <?php echo $comentario['ds_avaliacao']; ?>
                    </div><!-- /panel-body -->
                </div><!-- /panel panel-default -->
            </div><!-- /col-sm-5 -->
            
        
        </div>
	<?php	}}}
			else
			{
				$selecao = "select cd_cpf_cliente, nm_cliente, nm_email,nr_telefone,nr_endereco,nr_cep from cliente where nm_email = '$per'"; 
         		$resultado = $mysqli->query($selecao) or die ($mysqli->error);
         		$row = $resultado->fetch_assoc();
				if($row["nm_email"]==$per)
				{
					$nome = $row["nm_cliente"];
         			$email = $row["nm_email"];
         			$telefone = $row["nr_telefone"];
         			$numero = $row["nr_endereco"];
         			$CPF = $row["cd_cpf_prestador"];
         			$CEP = $row["nr_cep"];
         			
              echo "<form method='post' name='formulario'>";
              
                    echo "<div class='container'>";
                    echo "<img src='/uploads/C-".$CPF.".jpg' width='150' height='150'>" ;
                    echo "<div class='col-md-12'>";
					echo "<label >Nome</label>";
          			echo "<input type = 'text' class='form-control'";
            		echo    " name = 'nome'";
               		echo  "value = '$nome'";
               		echo " readonly/>";
          			echo "<br/>";
          			
          			

         			echo "<label >Email</label>";
          			echo "<input type = 'text' class='form-control'";
                echo "id = 'correio'";
            		echo    " name = 'email'";
               		echo  "value = '$email' ";
               		echo "readonly />";
               		echo "<br/>";
               		echo "</div>";
        
            echo "<div class='col-md-12'>";
             echo "<label >Telefone</label>";
             echo "<input type = 'text' class='form-control'";
             echo    " name = 'telefone'";
             echo  "value = '$telefone' ";
             echo "readonly />";
             echo "<br/>";
             
             echo "<label >Numero</label>";
          	 echo "<input type = 'text' class='form-control'";
             echo    " name = 'numero'";
             echo  "value = '$numero' ";
             echo "readonly />";
            echo "<br/>";
            echo "</div>";   
         
            echo "<div class='col-md-12'>";
            echo "<label >CEP</label>";
          	echo "<input type = 'text' class='form-control'";
            echo    " name = 'bairro'";
            echo  "value = '$CEP' ";
            echo "readonly />";
            echo "<br/>";
            echo "</div>";
            echo "<br/>";
            echo "</div>";
            echo"<input type='submit' class='btn btn-primary btn-lg pull-right' onclick='Denunciar()' value='Denunciar'/>";
            echo"</form>";
            
				}
				else{
					echo "<h2>Página não encontrada!</h2>";
				}
			}
			?>


          <br/>


             <br/>



       </p>
        </div>


      </fieldset>

    </form>
        </div>
                </div>

          </div>
            <div class="row"></div>

    <script src="//malsup.github.io/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript">
    
        var address1 = "<?php echo $CEP ?>";
		var numaddress1 = "<?php echo $numero ?>";
		//var address2 = "<?php echo $enderecous; ?>";
		var endereco;
		var latitude1;
		var longitude1;
		var latitude2;
		var longitude2;
		var centrolat;
		var centrolg;
        var marcador = "marcador.png";
    
        jQuery(function($){
            var cepSoNumeros = address1.replace(/[^0-9]/gi, '');
            $.ajax({ 
                url: "https://viacep.com.br/ws/"+cepSoNumeros+"/json/",
                type: 'GET',
                success: function (dados) {
                    var resultado = dados;
                    if(Object.keys(resultado)[0]=="cep"){
                        endereco = resultado.localidade + ", " + resultado.bairro + ", "  + resultado.logradouro + " " + numaddress1;
                        inicializarMapa();
                    }else{

                    }
                },
                error: function () {

                }
            });
        });
    
		function inicializarMapa() {

    		var geocoder1 = new google.maps.Geocoder();
    		var geocoder2 = new google.maps.Geocoder();
		
        
        
        
        //function geolocalizar(){
            geocoder1.geocode( { 'address': endereco}, function(results, status) {

				  if (status == google.maps.GeocoderStatus.OK) {
					latitude1 = results[0].geometry.location.lat();
					longitude1 = results[0].geometry.location.lng();
					pronto();
				  }
				});
        //}
        /*
		geocoder1.geocode( { 'address': address1}, function(results, status) {

		  if (status == google.maps.GeocoderStatus.OK) {
			latitude1 = results[0].geometry.location.lat();
			longitude1 = results[0].geometry.location.lng();

			//alert(latitude);


				geocoder2.geocode( { 'address': address2}, function(results, status) {

				  if (status == google.maps.GeocoderStatus.OK) {
					latitude2 = results[0].geometry.location.lat();
					longitude2 = results[0].geometry.location.lng();
					pronto();
				  }
				});
		  }
		});
		*/
		/*
		geocoder2.geocode( { 'address': address2}, function(results, status) {

		  if (status == google.maps.GeocoderStatus.OK) {
			latitude2 = results[0].geometry.location.lat();
			longitude2 = results[0].geometry.location.lng();
			conf2=true;
		  }
		});
		*/


		function pronto (){
			//centrolat = (latitude1+latitude2)/2;
			//centrolg = (longitude1+longitude2)/2;
			var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 11,
			  center: {lat: latitude1, lng: longitude1}


			});
			var marker1 = new google.maps.Marker({
              map: map,
              position: {lat: latitude1, lng: longitude1},
              icon: marcador
            });
            /*
			var marker2 = new google.maps.Marker({
              map: map,
              position: {lat: latitude2, lng: longitude2},

            });
            */
        }
      }

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeOjMtwy0vXBK5MlFaU4wxf8qRV_ys7Gk&&callback=initialize">
    </script>
    </section>

    <!-- About Section --><!-- Contact Section --><!-- Footer -->
    <footer class="text-center">
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
