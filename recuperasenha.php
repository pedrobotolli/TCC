<?php

include('conexao.php');
$email = $_POST['email'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

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
$senha1 = crypt($password,'rl');
$valida = "select cd_cpf_prestador, nm_email from prestador where nm_email = '$email' and cd_cpf_prestador = '$cpf'";
$resultado = $mysqli->query($valida);
$row = $resultado->fetch_assoc();

if($row['nm_email'] == $email and $row['cd_cpf_prestador'] == $cpf){


$sql="update prestador set cd_senha='$senha1' where nm_email='$email' and cd_cpf_prestador='$cpf'";
$mysqli->query($sql) or die ($mysqli->error);

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
}else{
	echo 'Usuario não existe';
}
?>