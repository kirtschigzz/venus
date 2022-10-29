<?php

    if (isset($_POST['email'])){

        include ('conexao.php');

        $email = $_POST ['email'];
        $senha = password_hash($_POST ['senha'], PASSWORD_DEFAULT);
        $razaoSocial = $_POST ['razaoSocial'];
        $nomeFantasia = $_POST ['nomeFantasia'];
        $cnpj = $_POST ['cnpj'];

        $mysqli->query("INSERT INTO empresa
                            (cnpj, razaoSocial, nomeFantasia, email, senha) VALUES
                            ('$cnpj', '$razaoSocial','$nomeFantasia','$email', '$senha')");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/loginCadastro.css">
</head>

<body>

<header>
            
        <a class="menu-item" href="index.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
        
        <nav>
            <a class="menu-item" href="index.php" target="_self"> Home </a>
            <a class="menu-item" href="venus.php" target="_self"> Venus </a>
            <a class="menu-item" href="login.php" target="_self"> Login </a>
        </nav>
        
        </header>
    


    <main>

        <h1 id="titulo">Cadastre-se!</h1>

    <div id="principal">

    <form method="post" action="">

        <fieldset>

            <div class="campo">
                <label for="email"> Email </label>
                <input type="email" name="email" required>
            </div>

        
            <div class="campo">
                <label for="senha">Senha </label>
                <input type="password" name="senha" required>
            </div>

            <div class="campo">
                <label for="razaoSocial"> Razão Social </label>
                <input type="text" name="razaoSocial" required>
            </div>

            <div class="campo">
                <label for="nomeFantasia"> Nome Fantasia </label>
                <input type="text" name="nomeFantasia" required>
            </div>

            <div class="campo">
                <label for="cnpj"> CNPJ </label>
                <input type="number" name="cnpj" placeholder="somente números"  required>
            </div>

            <div class="campo">
                <button id="enviar" type="submit" value="submit"> Cadastrar </button>
            </div>

        </fieldset>

    </form>
        
    </div>
    </main>
    
    <footer>
		<img class="logo2" src="imagens/V.png" width="400px">
	</footer>

<script src="./js/main.js"> </script>    

</body>
</html>
