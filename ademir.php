<?php

include 'conexao.php';

$cpf = $_POST['cpf'];


$sql = "SELECT * from prestador where cd_cpf_prestador = '$cpf' ";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_assoc();
     if($row['cd_cpf_prestador'] == $cpf){
 
	$denuncia = "SELECT * from denuncia where cd_cpf_prestador = '$cpf'";
	$resultdenuncia = $mysqli->query($denuncia);
		  while($busca=$resultdenuncia->fetch_assoc()){
			  $deletedenuncia = "DELETE from denuncia where cd_denuncia = ". $busca['cd_denuncia'];
			  $mysqli->query($deletedenuncia) or die ($mysqli->error);
		  }
		  $up= "update prestador set ic_ativo=0 where cd_cpf_prestador=".$cpf;
			  if($mysqli->query($up) == TRUE){
			  echo "Delete denuncia! ";
			  }
	
		 
	$avaliacao = "SELECT * from avaliacao where cd_cpf_prestador = '$cpf'";
	$resultavaliacao = $mysqli->query($avaliacao);
		 while($buscaavaliacao=$resultavaliacao->fetch_assoc()){
			  $deleteavaliacao = "DELETE from avaliacao where cd_cpf_prestador = ". $buscaavaliacao['cd_cpf_prestador'];
			  $mysqli->query($deleteavaliacao) or die ($mysqli->error);
			 echo "Delete avaliacao! ";
		  }
		 
  $prest_profi = "SELECT * from prest_profi where cd_cpf_prestador = '$cpf'";
  $resultprest = $mysqli->query($prest_profi);
  $rowprest = $resultprest->fetch_assoc();
	if($rowprest['cd_cpf_prestador'] == $cpf){	 
     $deleteprest_profi = "DELETE from prest_profi where cd_cpf_prestador = '$cpf'";
		   $mysqli->query($deleteprest_profi) or die ($mysqli->error);
		echo "prost_profi deletado! ";
	}
	header('admin.php');
  }else{

$sqlcliente = "SELECT * from cliente where cd_cliente = '$cpf' ";
$resultadocliente = $mysqli->query($sqlcliente);
$rowcliente = $resultadocliente->fetch_assoc();
     if($rowcliente['cd_cliente'] == $cpf){
		
  $denunciac = "SELECT * from denuncia where cd_cliente = '$cpf'";
  $resultdenunciac = $mysqli->query($denunciac);
		while($buscadenunciac=$resultdenunciac->fetch_assoc()){
			  $deletedenunciac = "DELETE from denuncia where cd_denuncia = ". $buscadenunciac['cd_denuncia'];
			  $mysqli->query($deletedenunciac) or die ($mysqli->error);
		  }
		  $up= "update prestador set ic_ativo=0 where cd_cpf_prestador=".$cpf;
			  if($mysqli->query($up) == TRUE){
			  echo "Delete denuncia! ";
			  }
		
		  $avaliacaoc = "SELECT * from avaliacao where cd_cliente = '$cpf'";
  $resultavaliacaoc = $mysqli->query($avaliacaoc);
		 while($buscaavaliacaoc=$resultavaliacaoc->fetch_assoc()){
			  $deleteavaliacaoc = "DELETE from avaliacao where cd_cliente = ". $buscaavaliacaoc['cd_cliente'];
			  $mysqli->query($deleteavaliacaoc) or die ($mysqli->error);
			 echo "Delete avaliacao! ";
		  }
	header('admin.php');
  }else{
 echo "USUÁRIO NÃO ENCONTRADO!";
 }
}
?>
