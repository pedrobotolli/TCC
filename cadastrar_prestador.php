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
    $profissao1 = $_POST["profissao1"];
    $profissao2 = $_POST["profissao2"];
    $profissao3 = $_POST["profissao3"];
    $profissoes = array($profissao1, $profissao2, $profissao3);
    $numProfissoes = $_POST["numProfissoes"];
    $curriculo = $_POST["curriculo"]; 
    $queryPrestProf = FALSE;
    


    $validaPrest = "select cd_cpf_prestador, nm_email from prestador where nm_email = '$email' or cd_cpf_prestador = '$CPF'";
    $resultado = $mysqli->query($validaPrest) or die ($mysqli->error);
    $row = $resultado->fetch_assoc();
    $validaCli = "select cd_cpf_cliente, nm_email from cliente where nm_email = '$email'";
    $resultadoCli = $mysqli->query($validaCli) or die ($mysqli->error);
    $rowCli = $resultadoCli->fetch_assoc();
    if($row['nm_email' == $email] or $row['cd_cpf_prestador'] == $CPF){
        
        Echo "Usuario já existe";
    
    
    }elseif($rowCli['nm_email' == $email]){
        Echo "Esse e-mail já está sendo usado em outra conta!";
    }else{
     
        date_default_timezone_set("Brazil/East");
        $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
        $dir = '/home/ubuntu/workspace/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        $path = $_FILES['userfile']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $new_name = "P-" . $CPF . "." . $ext;
        
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
        switch ($numProfissoes){
            case 1:
                $pp1 = "insert into prest_profi (cd_profissao_pp, cd_cpf_prestador_pp) values ($profissao1,$CPF)";
                if($mysqli->query($pp1)===TRUE){
                    $queryPrestProf = TRUE;
                }
                break;
            case 2:
                $pp1 = "insert into prest_profi (cd_profissao_pp, cd_cpf_prestador_pp) values ($profissao1,$CPF)";
                $pp2 = "insert into prest_profi (cd_profissao_pp, cd_cpf_prestador_pp) values ($profissao2,$CPF)";
                if($mysqli->query($pp1)===TRUE && $mysqli->query($pp2)===TRUE){
                    $queryPrestProf = TRUE;
                }
                break;
            case 3:
                $pp1 = "insert into prest_profi (cd_profissao_pp, cd_cpf_prestador_pp) values ($profissao1,$CPF)";
                $pp2 = "insert into prest_profi (cd_profissao_pp, cd_cpf_prestador_pp) values ($profissao2,$CPF)";
                $pp3 = "insert into prest_profi (cd_profissao_pp, cd_cpf_prestador_pp) values ($profissao3,$CPF)";
                if($mysqli->query($pp1)===TRUE && $mysqli->query($pp2)===TRUE && $mysqli->query($pp3)===TRUE){
                    $queryPrestProf = TRUE;
                }
                break;
            default:
                echo "algo deu errado";
            
        }
        
        //$pp = "insert into prest_profi (cd_profissao_pp, cd_cpf_prestador_pp) values ($profissao,$CPF)";
        //echo $pp;
        //$mysqli->query($pp);
        $prest = "INSERT INTO prestador (cd_cpf_prestador, cd_senha, nm_prestador, nm_email, nr_telefone,ds_curriculo, nr_cep,nr_endereco, cd_ativacao, ic_ativo) VALUES ";
        $prest .= "('$CPF','$password','$nome','$email','$telefone','$curriculo','$CEP','$numero','$codigo',FALSE)";
        
        if($mysqli->query($prest)===TRUE && $queryPrestProf === TRUE){
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
            
        }else{
            
            echo 'ERRO: ' . $cadastro . '<br>' . $mysqli->error;
            
        }
    }

/*
include 'conexao.php';
$tamanho = 6;
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

$nome = $_POST["nome"];
$CPF = $_POST["CPF"];
$email = $_POST["email"];
$CEP = $_POST["endereco"];
$numero = $_POST["numero"];
$telefone = $_POST["telefone"];
$profissao = $_POST["profissao"];
$curriculo = $_POST["curriculo"]; 
$cd_logradouro = uniqid();
$senha = crypt($password,'rl');



$valida = "select cd_cpf_prestador, nm_email from prestador where nm_email = '$email' and cd_cpf_prestador = '$CPF'";
$resultado = $mysqli->query($valida);
$row = $resultado->fetch_assoc();

if($row['nm_email'] == $email and $row['cd_cpf_prestador'] == $CPF){

    echo"Usuario já cadastrado";

}else{
$pp = "insert into prest_profi values ('$profissao','$CPF')";

$prest = "INSERT INTO prestador (cd_cpf_prestador, cd_senha, nm_prestador, nm_email, nr_telefone,ds_curriculo, nr_cep, cd_ativacao, ic_ativo) VALUES ";
$prest .= "('$CPF','$password','$nome','$email','$telefone','$curriculo','$CEP','$senha',TRUE)";

if($mysqli->query($prest)===TRUE && $mysqli->query($pp)===TRUE){
    echo 'Usuario incluido com sucesso';
    require 'vendor/autoload.php';
    
    $dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
    $dotenv->load();
    
    $from = new SendGrid\Email("Equipe SPF", "naoresponda@serviceproviderfinder.com");
    $subject = "Aqui está a senha de seu primeiro acesso";
    $to = new SendGrid\Email($nome , $email);
    $content = new SendGrid\Content("text/html", 'Olá sr(a)'. $nome .' aqui está a senha de seu primeiro acesso, recomendamos que crie uma nova senha após o primeiro acesso. <br/> <b>'. $password .'</b> <br/> A equipe do SPF lhe dá as boas vindas, esperamos que tenha uma excelente experiência utilizando nosso sistema.');
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
}else{
    echo 'ERRO: ' . $sql . '<br>' . $mysqli->error;
}


$mysqli->close();  
	header("location: index.html");
}
*/
?>