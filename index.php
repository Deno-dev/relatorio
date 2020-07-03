<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> SuaNET - Login </title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div style="margin-bottom: 20px;">
            <img src="images/logo-suanet.png" width="380px;">
        </div>
        <div class="form-box">
            <form action="validass.php" method="post" name="formlogin">
                <div>
                    <input type="text" name="usuario" placeholder="Usuário" class="form-input" required="">
                </div>
                <div>
                    <input type="password" name="senha" placeholder="Senha" class="form-input" required="">
                </div>
                <div>
                    <input type="submit" value="Entrar" class="form-btn">
                </div>
            </form>
        </div>
        <footer>
            Dênis Silva - Suanet Telecomunicações - Todos os Direitos reservados - 2020.
        </footer>
    </div>
</body>
</html>