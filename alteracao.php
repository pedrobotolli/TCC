<?php
session_start();
include 'conexao.php';


if($_SESSION['cod'] == 2){
    

$nome = $_POST['nome'];
$CPF = $_POST['CPF'];
$email = $_POST['email'];
$CEP = $_POST['CEP'];
$numero = $_POST['numero'];
$curriculo = $_POST['curriculo'];
$telefone = $_POST['telefone'];
$prof = $_POST["profissao"];
$cd = "select cd_profissao from profissao where nm_profissao = '$prof'";
$resultado = $mysqli->query($cd) or die ($mysqli->error);
$res = $resultado->fetch_assoc();
$profissao=$res['cd_profissao'];
$up = "update prestador set nm_prestador = '$nome',nm_email='$email',ds_curriculo = '$curriculo',nr_telefone = '$telefone',nr_cep = '$CEP',nr_endereco = '$numero' where cd_cpf_prestador = '$CPF'";
$upPro = "update prest_profi set cd_profissao_pp = '$profissao' where cd_cpf_prestador_pp = '$CPF'"; 
    $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
    $dir = '/home/ubuntu/workspace/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $path = $_FILES['userfile']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $ext = strtolower($ext);
    $new_name = "P-" . $CPF . "." . $ext;
    if(file_exists("/home/ubuntu/workspace/uploads/$new_name")) unlink("/home/ubuntu/workspace/uploads/$new_name");
    //if($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$new_name)) {
            echo "Arquivo válido e enviado com sucesso.\n";
        } else {
            echo "Possível ataque de upload de arquivo!\n";
            file_put_contents("teste.log",$_FILES);
            error_log('Erro no upload');
        }
        
        echo 'Aqui está mais informações de debug:';
        print_r($_FILES);
        
        print "</pre>";
    //} else {
    //    echo "<script type='javascript'>alert('Tipo de arquivo errado!');";
    //    echo "</script>";
    //}
        

if($mysqli->query($up) == TRUE and $mysqli->query($upPro) == TRUE){
    $_SESSION['email']=$email;
    header("location: meuperfil.php");
}else{
	echo($mysqli->error);
}
}else{
$nome = $_POST['nome'];
$CPF = $_POST['CPF'];
$email = $_POST['email'];
$CEP = $_POST['CEP'];
$numero = $_POST['numero'];
$telefone = $_POST['telefone'];

$up = "update cliente set nm_cliente = '$nome',nm_email='$email',nr_telefone = '$telefone',nr_cep = '$CEP', nr_endereco = '$numero' where cd_cpf_cliente = '$CPF'";

    $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
    $dir = '/home/ubuntu/workspace/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $path = $_FILES['userfile']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $ext = strtolower($ext);
    $new_name = "P-" . $CPF . "." . $ext;
    echo '<pre>';
    //if($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
        if(file_exists("/home/ubuntu/workspace/uploads/$new_name"))
        unlink("/home/ubuntu/workspace/uploads/$new_name");
            
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$new_name)) {
            echo "Arquivo válido e enviado com sucesso.\n";
        } else {
            echo "Possível ataque de upload de arquivo!\n";
            file_put_contents("teste.log",$_FILES);
            error_log('Erro no upload');
        }
        echo 'Aqui está mais informações de debug:';
        
            
        print "</pre>";
    //} else {
    //    echo "<script type='javascript'>alert('Tipo de arquivo errado!');";
    //    echo "</script>";
    //    }
        

if($mysqli->query($up) == TRUE){
    $_SESSION['email']=$email;
    header("location: meuperfil.php");
}else{
	echo($mysqli->error);
}
}
?>

