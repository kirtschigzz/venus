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
				<a class="menu-item" href="venus.php" target="_self"> Venus </a>
				<a class="menu-item" href="login.php" target="_self"> Login </a>
			</nav>
		
	</header>
	

	<main>

		<section id="titulo">
			<h1> Faça Login! </h1>
		</section>

		<section id="formLogin">
				<form method="post" action="link banco de dados">

				<fieldset>

					<div class="campo">
						<label for="email"> Email </label>
						<input type="email" name="email" required>
					</div>

					<div class="campo">
						<label for="senha">Senha </label>
						<input type="password" name="senha" required>
					</div>

					<div class="campo1">
						<button id="logar" type="submit"> Logar </button>
					</div>

				</fieldset>

				</form>
		</section>

			<div class="tiposLogin">
					<a class="tipos" href="loginUser.php"> <button class="ir" type="submit"> Cadastre-se </button> </a>
					<a class="tipos" href="loginEmpresa.php"> <button class="ir" type="submit"> É uma Empresa? </button> </a>
			</div>

	</main>

	<footer>
		<img class="logo2" src="imagens/V.png" width="400px">
	</footer>

<script src="./js/main.js"> </script>
</body>

</html>


 