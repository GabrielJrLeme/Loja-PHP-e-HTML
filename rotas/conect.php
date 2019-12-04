<?php  
	$domain="localhost";	// localização
	$user="root";			// usuário
	$password="";			// senha
	$database="projeto";	// banco de dados	
	$dor = 3307;

	$mysqli = new mysqli($domain,$user,$password,$database,$dor);

	if($mysqli->connect_errno){

		echo "Infelismente perdemos a conexão.";
		echo $mysqli->connect_error; // mostra causa do erro
	}
?>