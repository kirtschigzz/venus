<?php

// versão final

	include('conexao.php');
	
	if(!isset($_SESSION)){
		@session_start();
	}

	if(isset($_POST["comecar"])){

		if(!isset($_SESSION['usuario'])){
			header("Location: login.php");
		
		}else{
			header("Location: venus.php");

		}
   	}
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/main.js"></script>
    <title>Bem vindo(a) ao Venus </title>
    
</head>


<body>
	
<header>
            
	<a class="menu-item" href="index.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
		
	<nav>
		<a class="menu-item" href="index.php" target="_self"> Home </a>

		<a class="menu-item" href="venus.php" target="_self"> Venus </a>

<?php 	if (!isset($_SESSION['usuario'])){ 

		//Se o usuário não estiver logado, aparecerá a opção de login ?>

			<a class="menu-item" href="login.php" target="_self"> Login </a>

		<?php } ?>

<?php 	if (isset($_SESSION['usuario'])){ 

		//Se o usuário estiver logado, aparecerá a opção de perfil ?>

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
	
<main id="layout">

	<section class="layout-principal">

		<div class="titulo">

		<h1 class="titulo1"> Venus </h1>
			

		<h2 class="subtitulo">
			Te ajudamos a combater a <br> propaganda enganosa
		</h2>

		<form method="post" action="">
			<button class="botao-comecar" type="submit" name="comecar"> Comece aqui </button>
		</form>

		
		</div>

		<img class="logo-layout" src="imagens/V.png">

	</section>
			
	<section class="layout-secundario">
		<h3 class="titulo-secundario"> O que fazer? </h3>
		<p class="texto"> Compartilhe <strong class="enfase">suas experiências</strong> com os cosméticos</p>
		<p class="texto"> Nos conte qual parte <strong class="enfase"> não te agradou</strong></p>
		<p class="texto"> Contribua para um ambiente de cosméticos <strong class="enfase"> realistas</strong></p>
		<p class="texto"> Confira a <strong class="enfase"> opinião de outras pessoas</strong> antes de comprar um produto</p>
	</section>
	
</main>

	<footer id="rodape">
		<img class="logo2" src="imagens/V.png" width="400px">
	</footer>

<script src="./js/main.js"> </script>
	
</body>

</html>

