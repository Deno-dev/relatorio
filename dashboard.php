<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-png">
    <meta charset="utf-8">
		<title> SuaNET - ADM</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/javascript.js">
			
		</script>
	</head>
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
		//if ($tipo != "usuario" or $tipo != "administrador") {
			//echo "<script>
			//alert('Você não tem acesso a esta pagina!');";
			//echo "javascript:window.location='cliente.php';</script>";
		//}
		 ?>
		<div class="navbar">
			<ul>
				<li><img src="images/user.png" width="50"></li>
				<li>Como vai, <?php echo $usuario; ?>?</li>
				<li><img src="images/logo-suanet.png" width="150" id="logo"></li>
			</ul>
		</div>
		<div class="container">
			<div class="cont-box">
				<div id="oss">
					<form name="formpesquisa" action="pesquisa.php" method="post">
						<input class="pesquisa" placeholder=" Insira a rua que procura..."  type="text" name="pesquisa">
						<input type="image" src="images/pesquisa.png" width="30" class="pesquisab">
					</form>

					
						<?php 
    					include 'conexao.php';

        				$executa = "SELECT count(*) as NrVezes, rua FROM atendimentos GROUP BY rua ORDER BY NrVezes DESC";

    					$query = $link->query($executa);
    					$resultado = $link->query("SELECT * FROM atendimentos where assunto like '%l%'");
    					$clientes = $resultado->num_rows;
    					echo " -" . " - ". "Total de Atendimentos: " . $clientes . ". Listando por ruas com mais atendimentos desde o dia 01/04 até 10/05	";
    					$resultado->close();

    					echo "<div class='teste'>";
    					while($dados = $query->fetch_object()){
    						echo "<div class='atendimento'>";        					
        					echo $dados->NrVezes . " Atendimentos";
        					echo "<br>";
        					echo $dados->rua;
        					echo "</div>";
    					}
    					echo "</div>";
    					$query->free();
					 ?>	
					</div>
				</div>
			<footer class="foo">
				Dênis Silva - SuaNet Telecomunicações LTDA - Todos os Direitos Reservados 2020.
			</footer>
		</div>
	</body>
</html>	