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
$profissao = $_POST["profissao"];

$up = "update prestador set nm_prestador = '$nome',nm_email='$email',ds_curriculo = '$curriculo',nr_telefone = '$telefone',nr_cep = '$CEP',nr_endereco = '$numero' where cd_cpf_prestador = '$CPF'";

$upPro = "update prest_profi set cd_profissao_pp = '$profissao' where cd_cpf_prestador_pp = '$CPF'"; 

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
if($mysqli->query($up) == TRUE){
    $_SESSION['email']=$email;
    header("location: meuperfil.php");
}else{
	echo($mysqli->error);
}
}
?>

