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
			  $deleteadmdenuncia = "DELETE from adm_denuncia where cd_denuncia = ". $busca['cd_denuncia'];
			  $mysqli->query($deleteadmdenuncia) or die ($mysqli->error);
			  $deletedenuncia = "DELETE from denuncia where cd_denuncia = ". $busca['cd_denuncia'];
			  $mysqli->query($deletedenuncia) or die ($mysqli->error);
			  echo "Delete denuncia! ";
		  }
	
		 
	$indicacao = "SELECT * from indicacao where cd_cpf_prestador = '$cpf'";
	$resultindicacao = $mysqli->query($indicacao);
		 while($buscaindicacao=$resultindicacao->fetch_assoc()){
			  $deleteindicacao = "DELETE from indicacao where cd_cpf_prestador = ". $buscaindicacao['cd_cpf_prestador'];
			  $mysqli->query($deleteindicacao) or die ($mysqli->error);
			 echo "Delete indicacao! ";
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
     $delete = "DELETE from prestador where cd_cpf_prestador = '$cpf'";
	 
  
     $mysqli->query($delete) or die ($mysqli->error);
     echo "Deletado o Prestador!";
  }else{

$sqlcliente = "SELECT * from cliente where cd_cliente = '$cpf' ";
$resultadocliente = $mysqli->query($sqlcliente);
$rowcliente = $resultadocliente->fetch_assoc();
     if($rowcliente['cd_cliente'] == $cpf){
		
  $denunciac = "SELECT * from denuncia where cd_cliente = '$cpf'";
  $resultdenunciac = $mysqli->query($denunciac);
		while($buscadenunciac=$resultdenunciac->fetch_assoc()){
			  $deleteadmdenunciac = "DELETE from adm_denuncia where cd_denuncia = ". $buscadenunciac['cd_denuncia'];
			  $mysqli->query($deleteadmdenunciac) or die ($mysqli->error);
			  $deletedenunciac = "DELETE from denuncia where cd_denuncia = ". $buscadenunciac['cd_denuncia'];
			  $mysqli->query($deletedenunciac) or die ($mysqli->error);
			  echo "Delete denuncia! ";
		  }
		
		  $avaliacaoc = "SELECT * from avaliacao where cd_cliente = '$cpf'";
  $resultavaliacaoc = $mysqli->query($avaliacaoc);
		 while($buscaavaliacaoc=$resultavaliacaoc->fetch_assoc()){
			  $deleteavaliacaoc = "DELETE from avaliacao where cd_cliente = ". $buscaavaliacaoc['cd_cliente'];
			  $mysqli->query($deleteavaliacaoc) or die ($mysqli->error);
			 echo "Delete avaliacao! ";
		  }
		
  $indicacaoc = "SELECT * from indicacao where cd_cliente = '$cpf'";
  $resultindicacaoc = $mysqli->query($indicacaoc);
		 while($buscaindicacaoc=$resultindicacaoc->fetch_assoc()){
			  $deleteindicacaoc = "DELETE from indicacao where cd_cliente = ". $buscaindicacaoc['cd_cliente'];
			  $mysqli->query($deleteindicacaoc) or die ($mysqli->error);
			 echo "Delete indicacao! ";
		  }
     $deletecliente = "DELETE from cliente where cd_cliente = '$cpf'";
     $mysqli->query($deletecliente) or die ($mysqli->error);
     echo "Deletado o Cliente!";
  }else{
 echo "USUÁRIO NÃO ENCONTRADO!";
 }
}
?>
