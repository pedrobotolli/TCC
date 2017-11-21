<?php

include 'conexao.php';
session_start();
$cliente = $_SESSION['email'];
$men = $_POST['mensagem'];
$indicado = $_POST['emailIn'];

$prest = $_SESSION['CPF_PREST'];
$profi = $_POST['profissao'];

$sel = "select nm_cliente from cliente where nm_email = '$indicado'";
$resnomeI = $mysqli->query($sel);
$row2 = $resnomeI->fetch_assoc();
$nomeI = $row2['nm_cliente'];

$prestEmail = "select nm_email, nm_prestador from prestador where cd_cpf_prestador = '$prest'";
$resultado = $mysqli->query($prestEmail);
$row = $resultado->fetch_assoc();
$nomeP = $row['nm_prestador'];

$pro = "select nm_profissao from profissao as p, prestador as t, prest_profi as pp where t.cd_cpf_prestador = pp.cd_cpf_prestador and pp.cd_profissao = p.cd_profissao";
$proprofi = $mysqli->query($pro);
$row1 = $proprofi->fetch_assoc();
$profi = $row1['nm_profissao'];

echo $cliente;
echo $men;
echo $indicado;
echo $prest;
echo $profi;
echo $nomeP;

if($row['nm_email'] == " " or $cliente == " " or $indicado == " "){

    echo "Preencha todos os campos para enviar a indicação";

}else{
    require 'vendor/autoload.php';
    
    $dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
    $dotenv->load();
    
    $from = new SendGrid\Email("Equipe SPF", "naoresponda@serviceproviderfinder.com");
    $subject = "Olá sr(a) temos uma indicação para você";
    $to = new SendGrid\Email($nomeI , $indicado);
    $content = new SendGrid\Content("text/html", 'Olá sr(a) '. $nomeI .' um de nossos usuarios tem uma recomendação para você. <br/> <b>O prestador de serviço '. $nomeP .' que trabalha como '. $profi .'.</b> <br/> Esperamos que caso venha contratalo desejamos que o sr.(a) tenha uma otima experiencia.');
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
}

?><?php

include 'conexao.php';
session_start();
$cliente = $_SESSION['email'];
$men = $_POST['mensagem'];
$indicado = $_POST['emailIn'];

$prest = $_SESSION['CPF_PREST'];
$profi = $_POST['profissao'];

$sel = "select nm_cliente from cliente where nm_email = '$indicado'";
$resnomeI = $mysqli->query($sel);
$row2 = $resnomeI->fetch_assoc();
$nomeI = $row2['nm_cliente'];

$prestEmail = "select nm_email, nm_prestador from prestador where cd_cpf_prestador = '$prest'";
$resultado = $mysqli->query($prestEmail);
$row = $resultado->fetch_assoc();
$nomeP = $row['nm_prestador'];

$pro = "select nm_profissao from profissao as p, prestador as t, prest_profi as pp where t.cd_cpf_prestador = pp.cd_cpf_prestador and pp.cd_profissao = p.cd_profissao";
$proprofi = $mysqli->query($pro);
$row1 = $proprofi->fetch_assoc();
$profi = $row1['nm_profissao'];

echo $cliente;
echo $men;
echo $indicado;
echo $prest;
echo $profi;
echo $nomeP;

if($row['nm_email'] == " " or $cliente == " " or $indicado == " "){

    echo "Preencha todos os campos para enviar a indicação";

}else{
    require 'vendor/autoload.php';
    
    $dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
    $dotenv->load();
    
    $from = new SendGrid\Email("Equipe SPF", "naoresponda@serviceproviderfinder.com");
    $subject = "Olá sr(a) temos uma indicação para você";
    $to = new SendGrid\Email($nomeI , $indicado);
    $content = new SendGrid\Content("text/html", 'Olá sr(a) '. $nomeI .' um de nossos usuarios tem uma recomendação para você. <br/> <b>O prestador de serviço '. $nomeP .' que trabalha como '. $profi .'.</b> <br/> Esperamos que caso venha contratalo desejamos que o sr.(a) tenha uma otima experiencia.');
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    
    //usando o  getenv
    $apiKey = getenv('SENDGRID_API_KEY');
    
    
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    print_r($response->headers());
    echo $response->body();
    
    //require 'PHPMailerAutoload.php';
    //$mail = new PHPMailer;
    
    //$mail->SMTPDebug = 2;                               // Enable verbose debug output
    
    //$mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    //$mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'tccserviceproviderfinder@gmail.com';                 // SMTP username
    //$mail->Password = 'Rafapramimemerda';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //$mail->Port = 587;                                    // TCP port to connect to
    
    //$mail->setFrom('tccserviceproviderfinder@gmail.com', 'SPF');
    //$mail->addAddress($indicado, $nomeI);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //$mail->isHTML(true);                                  // Set email format to HTML
    
    //$mail->Subject = 'Olá sr(a) temos uma indicação para você';
    //$mail->Body    = 'Olá sr(a)'. $nomeI .' um de nossos usuarios tem uma recomendação para você. <br/> <b>O prestador de serviço'. $nomeP .' que trabalha como '. $profi .'.</b> <br/> Esperamos que caso venha contratalo desejamos que o sr.(a) tenha uma otima experiencia.';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    //if(!$mail->send()) {
    //    echo 'Message could not be sent.';
    //    echo 'Mailer Error: ' . $mail->ErrorInfo;
    //} else {
    //    echo 'Message has been sent';
    //}
    
    $mysqli->close();  
    header("location: index.html");
}

?>