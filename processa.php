<?php

	include_once("conexao.php");
	
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	for ($i=0; $i < 275 ; $i++) {	
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);//['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;	
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$id = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				//echo "ID: $id <br>";
				
				$cliente = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				//echo "Cliente: $cliente <br>";
				
				$assunto = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				//echo "Assunto: $assunto <br>";

				$criacao = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				//echo "Data: $criacao <br>";

				$dp = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				//echo "Departamento: $dp <br>";

				$rua = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				//echo "Rua: $rua <br>";

				$casa = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
				//echo "Número da Casa: $casa <br>";

				$bairro = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
				//echo "Bairro: $bairro <br>";						
				//echo "<hr>";
				
				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO atendimentos(id, cliente, assunto, criacao, dp, rua, casa, bairro) VALUES ('$id', '$cliente', '$assunto', '$criacao', '$dp', '$rua', '$casa', '$bairro')";
				$resultado_usuario = mysqli_query($conn, $result_usuario);
				if ($i == 275) {
					break;
					die();
				}
			}
			$primeira_linha = false;
		}
	}
}
?>