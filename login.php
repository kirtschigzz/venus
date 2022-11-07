<?php

if (isset($_POST ['email']) && ($_POST ['senha'])){

	include('conexao.php');

	$email = $mysqli->escape_string ($_POST ['email']);
	$senha = $_POST ['senha'];

	$sql_code = "SELECT * FROM usuario WHERE email = '$email'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	$erro = false;

	if($sql_query->num_rows == 0){
		echo "<p> O email informado é incorreto </p>";
	}else{
		$usuario = $sql_query->fetch_assoc();

		if (!password_verify($senha, $usuario['senha'])){
			echo "senha incorreta";
		}else{
			if(!isset($_SESSION)){
				@session_start();

				$_SESSION['usuario'] = $usuario['id'];

				header("Location: venus.php");
			}
		}

	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Venus </title>

	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>


<body>

	<header>
            
		<a class="menu-item" href="index.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
		
		<nav>
            <a class="menu-item" href="index.php" target="_self"> Home </a>

            <?php if (!isset($_SESSION['usuario'])){ ?>
            <a class="menu-item" href="login.php" target="_self"> Login </a>
            <?php } ?>

            <?php if (isset($_SESSION['usuario'])){ ?>

            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Perfil</button>

                <div id="myDropdown" class="dropdown-content">
                    <a href="perfil.php"> Suas Reclamações </a>
                    <a href="logout.php">Sair</a>
                </div>

            </div>

            <?php } ?>
        </nav>
		
	</header>
	

	<main>
	
	<div id="teste">

		<div id="principal">

			<h1 id="titulo"> Faça Login! </h1>

			<form method="post">

				<fieldset>

					<div class="campo">
						<label for="email"> Email </label>
						<input type="email" name="email" required>
					</div>

					<div class="campo">
						<label for="senha"> Senha </label>
						<input type="password" name="senha" required>
					</div>

					<div class="campo1">
						<button id="logar" type="submit"> Logar </button>
					</div>

				</fieldset>

				</form>

			<div class="tiposLogin">
					<a class="tipos" href="loginUser.php"> <button class="ir" type="submit"> Cadastre-se </button> </a>
			</div>

		</div>
	</div>>
	</main>

<script src="./js/main.js"> </script>
</body>

</html>


 