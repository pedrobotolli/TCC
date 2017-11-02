<?php

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

$nome = $_POST['nome'];
$CPF = $_POST["CPF"];
$email = $_POST["email"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$bairro = $_POST["bairro"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$telefone = $_POST["telefone"];
$cd_logradouro = uniqid();
$senha = crypt($password,'rl');



$valida = "select cd_cliente, nm_email from cliente where nm_email = '$email' and cd_cliente = '$CPF'";
$resultado = $mysqli->query($valida);
$row = $resultado->fetch_assoc();

if($row['nm_email' == $email] and $row['cd_cliente'] == $CPF){
    
    Echo "Usuario já existe";


}else{
    $sql1 = "INSERT INTO logradouro (cd_logradouro, nm_rua, nr_casa, cd_bairro) VALUES ";
    $sql1 .= "('$cd_logradouro','$endereco','$numero',$bairro)";

    $sq2 = "INSERT INTO cliente (cd_cliente,cd_senha,nm_cliente,nr_telefone,nm_email,cd_logradouro)VALUES "; 
    $sq2 .= "('$CPF','$senha','$nome','$telefone','$email','$cd_logradouro')";

    
if($mysqli->query($sql1)===TRUE && $mysqli->query($sq2)===TRUE)
    {
    echo 'Usuario incluido com sucesso';
   
}else{
    echo "cade o numero".$bairro.".";
    echo 'ERRO: ' . $sql1 . '<br>' . $mysqli->error;
    
}}
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'tccserviceproviderfinder@gmail.com';                 // SMTP username
$mail->Password = 'Rafapramimemerda';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('tccserviceproviderfinder@gmail.com', 'SPF');
$mail->addAddress($email, $nome);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Aqui está a senha de seu primeiro acesso';
$mail->Body    = 'Olá sr(a)'. $nome .' aqui está a senha de seu primeiro acesso, recomendamos que crie uma nova senha após o primeiro acesso. <br/> <b>'. $password .'</b> <br/> A equipe do SPF lhe dá as boas vindas, esperamos que tenha uma excelente experiência utilizando nosso sistema.';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

$mysqli->close();  
	header("location: index.html");
    


?>