<?php
session_start();
include 'conexao.php';

$nome = $_POST['nome'];
$CPF = $_POST['CPF'];
$email = $_POST['email'];
$rua = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$numero = $_POST['numero'];
$curriculo = $_POST['curriculo'];
$bairro = $_POST['bairro'];
$telefone = $_POST['telefone'];
$profissao = $_POST["profissao"];

$up = "update prestador set nm_prestador = '$nome',nm_email='$email',ds_curriculo = '$curriculo',nr_telefone = '$telefone' where cd_cpf_prestador = '$CPF'";
$end = "select cd_logradouro from prestador where cd_cpf_prestador = '$CPF'";
$e = $mysqli->query($end);
$row = $e->fetch_assoc();
$local = $row["cd_logradouro"];
$loc = "update logradouro set nm_rua='$rua',nr_casa='$numero',cd_bairro = $bairro where cd_logradouro = '$local' ";


if($mysqli->query($up) == TRUE and $mysqli->query($loc) == TRUE){
    $_SESSION['email']=$email;
    header("location: busca.php");
}else{
	echo($mysqli->error);
}

?>

