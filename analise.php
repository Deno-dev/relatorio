<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Importar dados do Excel</title>
	<head>
	<body>
		<?php 
		session_start();
		if (!isset($_SESSION['tipo'])) {
			echo "<script>
			alert('Você precisa iniciar uma sessão! Entre com seu usuário e senha ;)');";
			echo "javascript:window.location='cliente.php';</script>";
			die();
		}
		$usuario =  $_SESSION['usuario'];
		$tipo = $_SESSION['tipo'];
		if ($tipo != "adm") {
			echo "<script>
			alert('Você não tem acesso a esta pagina!');";
			echo "javascript:window.location='cliente.php';</script>";
		}
		 ?>
		<h1>Upload Excel</h1>
		
		<form method="POST" action="processa.php" enctype="multipart/form-data">
			<label>Arquivo</label>
			<input type="file" name="arquivo"><br><br>
			<input type="submit" value="Enviar">
		</form>
		
	</body>
</html>