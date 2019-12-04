<?php 

	// QUABRO A SESSAO
	session_start();
	unset($_SESSION['usuario']);
	Header("Location:../index.php");
 ?>