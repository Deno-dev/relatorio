<?php 
	$host = "localhost";
	$banco = "suanet";
	$user = "root";
	$senha = "";

	$link = mysqli_connect($host, $user, $senha, $banco);
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
 ?>