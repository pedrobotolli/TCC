<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <title>Cadastro de Prestador</title>

    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">


    
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">



</head>

<body id="page-top" class="index">


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
    <script src="//malsup.github.io/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        var cepValido = false;
        var cpfValido = false;
        var profissoes = 1;
        function codeAddress() {
            
            document.getElementById("numProfissoes").value = profissoes;
            console.log(profissoes);
        }
        window.onload = codeAddress;
        
        /*jQuery(function($){
            $("#cpfUsuario").mask("999.999.999-99");
            $("#cep").mask("99999-999");
        });*/
    
        jQuery(function($){
            $( "#btVerificar" ).click(function() {
                var cpfSoNumeros = $("#cep").val().replace(/[^0-9]/gi, '');
                $.ajax({ 
                    url: "https://viacep.com.br/ws/"+cpfSoNumeros+"/json/",
                    type: 'GET',
                    success: function (dados) {
                        var resultado = dados;
                        if(Object.keys(resultado)[0]=="cep"){
                            document.getElementById("endereco").value = resultado.localidade + ", " + resultado.bairro + ", "  + resultado.logradouro;
                            validaCep();
                        }else{
                            alert("digite um cep valido");
                            cepErrado();
                        }
                    },
                    error: function () {
                        alert("Digite um cep valido");
                        cepErrado();
                    }
                });
            });
        });
     
        
        function cepErrado(){
            cepValido = false;
            document.getElementById("btEnviar").disabled=false;
        }
        function validaCep(){
            cepValido = true;
            alert(document.getElementById("endereco").value);
            verificaCampos();
        }
        function verificaCampos(){
            if(cpfValido==true && cepValido==true){
                document.getElementById("btEnviar").disabled=false;
            }
        }
        
        function digitarCPF(){
            if(validarCPF()){
                cpfValido=true;
                verificaCampos();
            }else{
                document.getElementById("btEnviar").disabled=false;
                cpfValido=false;
            }
        }
        
        function validarCPF() {
            var cpf = document.getElementById("cpfUsuario").value;
            cpf = cpf.split(/\D+/).join("");    
            if(document.getElementById("cpfUsuario").value == '') return false; 
            // Elimina CPFs invalidos conhecidos    
            if (cpf.length != 11 || 
                cpf == "00000000000" || 
                cpf == "11111111111" || 
                cpf == "22222222222" || 
                cpf == "33333333333" || 
                cpf == "44444444444" || 
                cpf == "55555555555" || 
                cpf == "66666666666" || 
                cpf == "77777777777" || 
                cpf == "88888888888" || 
                cpf == "99999999999")
                    return false;       
            // Valida 1o digito 
            var add = 0;    
            for (i=0; i < 9; i ++)       
                add += parseInt(cpf.charAt(i)) * (10 - i);  
                var rev = 11 - (add % 11);  
                if (rev == 10 || rev == 11)     
                    rev = 0;    
                if (rev != parseInt(cpf.charAt(9)))     
                    return false;       
            // Valida 2o digito 
            add = 0;    
            for (i = 0; i < 10; i ++)        
                add += parseInt(cpf.charAt(i)) * (11 - i);  
            rev = 11 - (add % 11);  
            if (rev == 10 || rev == 11) 
                rev = 0;    
            if (rev != parseInt(cpf.charAt(10)))
                return false;
                
            return true;   
        }
        
        function addProfissao(){
            if(profissoes<3){
                profissoes=profissoes+1;
                var nProf= "prof"+profissoes;
                var elemento = document.getElementById(nProf);
                elemento.style.display = "block";
                document.getElementById("numProfissoes").value = profissoes;
            }
        }
        function rmProfissao(){
            if(profissoes>1){
                var nProf= "prof"+profissoes;
                var elemento = document.getElementById(nProf);
                elemento.style.display = "none";
                profissoes=profissoes-1;        
                document.getElementById("numProfissoes").value = profissoes;
            }
        }
    </script>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <h2>Cadastro de Prestador</h2><br>
                    <legend>Preencha o formulário para se cadastrar</legend>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <form enctype="multipart/form-data" action="cadastrar_prestador.php" method="POST">
            <fieldset>
            <div class = "row justify-content-center">
                <div class="col-md-4">
                    <label for="imagemPerfil" >Imagem de perfil </label>
                    <br><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                        <input type="file" id="idFileUpload" name="userfile" accept="image/png, image/jpg" >
                </div>
                <div class="col-md-8">
                    <label for="nomeUsuario">Nome</label>
                    <input type = "text" class="form-control" name = "nome" id="nomeUsuario" value= "" required>
                    <br>
                    <label for="cpfUsuario">CPF (somente números)</label>
                    <input type = "text" class="form-control" name = "CPF" id="cpfUsuario" onkeyup="digitarCPF()" value = "" required>
                </div>
            </div>
            <div class="row justify-content-center">                
                <div class="col-md-12">    
                    <br>
                    <label for="emailUsuario">Email</label>
                    <input type = "email" class="form-control" name = "email" id="emailUsuario" value = "" required>
                    <br>
                    <label>CEP (somente números)</label>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input type = "text" class="form-control" id="cep" name = "endereco" onkeydown="cepErrado()" value = "" required>
                                <span class="input-group-btn">
                                    <button type="button" id="btVerificar" class="btn btn-primary">Verificar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="endereco" name="endComp" value="">
                    <br>
                    <label>Numero</label>
                    <input type = "text" class="form-control" name = "numero" value = "" required>
                    <br>
                    <label>Telefone</label>
                    <input type = "text" class="form-control" name = "telefone" value = "" required>
                    <br>
                    
                    <input type="hidden" id="numProfissoes" name="numProfissoes" value = "" >
                    
                    
                    <?php
                        include 'conexao.php';
                        $sql = "select cd_profissao, nm_profissao from profissao";
                        $resultado = $mysqli->query($sql);
                    ?>
                    <label>Profissão</label>
                    <select id="profissao1" name ="profissao1" class="form-control">
                        <option></option>
                        <?php
                            while($row = $resultado->fetch_assoc()) {
                            echo "<option value=".$row["cd_profissao"].">".utf8_encode($row["nm_profissao"])."</option>";
                            }                    
    	                ?>	
                    </select>
                    <?php
                        include 'conexao.php';
                        $sql = "select cd_profissao, nm_profissao from profissao";
                        $resultado = $mysqli->query($sql);
                    ?>
                    <br>
                    <div id="prof2" style="display:none;">
                        <select id="profissao2" name ="profissao2" class="form-control" >
                            <option></option>
                            <?php
                                while($row = $resultado->fetch_assoc()) {
                                echo "<option value=".$row["cd_profissao"].">".utf8_encode($row["nm_profissao"])."</option>";
                                }                    
        	                ?>	
                        </select>
                        <br>
                    </div>
                    <?php
                        include 'conexao.php';
                        $sql = "select cd_profissao, nm_profissao from profissao";
                        $resultado = $mysqli->query($sql);
                    ?>
                    <div id="prof3" style="display:none;">
                        <select id="profissao3" name ="profissao3" class="form-control">
                            <option></option>
                            <?php
                                while($row = $resultado->fetch_assoc()) {
                                echo "<option value=".$row["cd_profissao"].">".utf8_encode($row["nm_profissao"])."</option>";
                                }                    
        	                ?>	
                        </select>
                        <br>
                    </div>
                    
                    <button type="button" class="btn btn-primary" onclick="addProfissao()" >Adicionar Profissão</button><button type="button" class="btn" onclick="rmProfissao()" >Remover Profissão</button>
                    <br>
                    <br>
                    <label>Descrição</label>
                    <textarea class="form-control" name="curriculo" rows="4" cols="50" required>
                        
                    </textarea>
                    <br>
                    <button type = "reset" class="btn btn-secondary btn-lg pull-right">Redefinir</button>
                    <button type = "submit" id="btEnviar" class="btn btn-primary btn-lg pull-right" >Enviar</button>
                </div>
            </div>
            </fieldset>
            </form>
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
