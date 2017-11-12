<?php

include 'conexao.php';
    
    function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
    $tamanho = 10;
    $consoantes = 'bcfg';
    $vogais = 'aeiou';
    $password= '';
    $alt = time() % 2;
    for ($i = 0; $i < $tamanho; $i++) {
        if ($alt == 1) {
            $password .= $consoantes[(rand() % strlen($consoantes))];
            $alt = 0;
           
        } else {
            $password .= $vogais[(rand() % strlen($vogais))];
            $alt = 1;
           
        }
    }
    
    $aux =  md5($password);
    $codigo = substr($aux,0,20);
    
    $nome = $_POST['nome'];
    $CPF = soNumero($_POST["CPF"]);
    $email = $_POST["email"];
    $CEP = $_POST["endereco"];
    $numero = $_POST["numero"];
    $telefone = $_POST["telefone"];
    $senha = crypt($password,'rl');
    
    
    
    $valida = "select cd_cpf_cliente, nm_email from cliente where nm_email = '$email' and cd_cpf_cliente = '$CPF'";
    $resultado = $mysqli->query($valida) or die ($mysqli->error);
    $row = $resultado->fetch_assoc();
    
    if($row['nm_email' == $email] and $row['cd_cpf_cliente'] == $CPF){
        
        Echo "Usuario já existe";
    
    
    }else{
        date_default_timezone_set("Brazil/East");
        $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
        $dir = '/home/ubuntu/workspace/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        $path = $_FILES['userfile']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $new_name = "C-" . $CPF . "." . $ext;
        
        echo '<pre>';
        if($ext == "jpg" || $ext == "jpeg" || $ext == "png"){

            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$new_name)) {
                echo "Arquivo válido e enviado com sucesso.\n";
            } else {
                echo "Possível ataque de upload de arquivo!\n";
            }
            
            echo 'Aqui está mais informações de debug:';
            print_r($_FILES);
            
            print "</pre>";
        } else {
            echo "<script type='javascript'>alert('Tipo de arquivo errado!');";
            echo "</script>";
        }
    
    
    
    
        $cadastro= "INSERT INTO cliente (cd_cpf_cliente,cd_senha,nm_cliente,nr_telefone,nm_email,nr_cep,nr_endereco,ic_ativo,cd_ativacao)VALUES "; 
        $cadastro.= "('$CPF','$password','$nome','$telefone','$email','$CEP','$numero',TRUE,'$senha')";
    
        
    if($mysqli->query($cadastro)===TRUE)
        {
        echo 'Usuario incluido com sucesso';
        require 'vendor/autoload.php';
        
       $dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
            $dotenv->load();
            
            $from = new SendGrid\Email("Equipe SPF", "naoresponda@serviceproviderfinder.com");
            $subject = "Faça seu primeiro acesso e defina a sua senha.";
            $to = new SendGrid\Email($nome , $email);
            $content = new SendGrid\Content("text/html", "http://tcc-spf-pedrobotolli.c9users.io/recupera_senha.php?codigo=". $codigo );
            $mail = new SendGrid\Mail($from, $subject, $to, $content);
            
            //usando o  getenv
            $apiKey = getenv('SENDGRID_API_KEY');
            
            
            $sg = new \SendGrid($apiKey);
            $response = $sg->client->mail()->send()->post($mail);
            echo $response->statusCode();
            print_r($response->headers());
            echo $response->body();
            
            $mysqli->close();  
            header("location: index.html");
        
        $mysqli->close();  
        header("location: index.html");
        
    }else{
        
        echo 'ERRO: ' . $cadastro . '<br>' . $mysqli->error;
        
    }
    
}



?>