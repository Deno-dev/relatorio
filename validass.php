<?php 
	include "conexao.php";
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];

	$executa = "SELECT usuario, senha, tipo from users where usuario='$usuario' and senha='$senha'";
	$query = $link->query($executa);
	$resultado = $query->fetch_object();

	if (isset($resultado)){
		$tipo = $resultado->tipo;

		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['tipo'] = $tipo;

		if ($tipo=="adm") {
			header('location:analise.php');
		}else{
			header('location:dashboard.php');
		}
	}else{
					echo "<script>
			alert('Ops, algo deu errado, verifique seu usuário e senha ou contate o administrador do sistema ;)');";
			echo "javascript:window.location='index.php';</script>";
	}
	$query->free();

 ?>