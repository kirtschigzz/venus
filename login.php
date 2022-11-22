<!DOCTYPE html>

<?php // versão final ?>

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

<?php

		if (isset($_POST ['email']) && ($_POST ['senha'])){

		//Se tiver o post do email e senha, o sistema criará uma query para consultar as informações no banco de dados

			include('conexao.php');

			// Escape string evita uma injeção maldosa dentro do banco de dados

			$email = $mysqli->escape_string ($_POST ['email']); 
			$senha = $_POST ['senha'];

			$sql_code = "SELECT * FROM usuario WHERE email = '$email'";
			$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

			if($sql_query->num_rows == 0){ ?>

				<p class="erro" style="color:red;"> O email está incorreto ou não foi cadastrado :( </p>;

<?php 			}else{

					$usuario = $sql_query->fetch_assoc();

					if (!password_verify($senha, $usuario['senha'])){ ?>

					<p class="erro" style="color:red;"> Senha incorreta :( </p>

<?php				}else{

					if(!isset($_SESSION)){

						@session_start();

						$_SESSION['usuario'] = $usuario['id'];

						header("Location: venus.php");		
				}}}}

?>			</div>
		</div>
	</main>

<script src="./js/main.js"> </script>
</body>

</html>


 