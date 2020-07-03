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
                    <form name="formpesquisa" method="post">
                        <input class="pesquisa" placeholder="Pesquisar..."  type="text" name="pesquisa">
                        <input type="image" src="images/pesquisa.png" width="30" class="pesquisab">
                    </form>
                        <?php 
                        $pesquisa = $_POST['pesquisa'];
                        if ($pesquisa == ' ') {
                            $executa = "SELECT * FROM `atendimentos` WHERE assunto like '%l%'";
                        }else{
                            $executa = "SELECT * FROM `atendimentos` WHERE rua like '%$pesquisa%'";
                        }
                        include 'conexao.php';

                        $query = $link->query($executa);
                        if ($pesquisa == '') {
                            $resultado = $link->query("SELECT * FROM `atendimentos` WHERE assunto like '%l%'");
                        }else{
                            $resultado = $link->query("SELECT * FROM `atendimentos` WHERE rua like '%$pesquisa%'");
                        }
                        $clientes = $resultado->num_rows;
                        echo " -" . " - ". "Total de Atendimentos: " . $clientes;
                        $resultado->close();

                        echo "<div class='teste'>";
                        while($dados = $query->fetch_object()){
                            echo "<div class='atendimento'>";
                            $id = $dados->id;
                            echo $id .  "</br>";
                            echo $dados->cliente;
                            echo "<br>";
                            echo $dados->assunto . "<br>";
                            echo $dados->rua . ", " .  $dados->casa . " - " . $dados->bairro;
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