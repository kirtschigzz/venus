<?php

	include('conexao.php');
	
	if(!isset($_SESSION)){
		@session_start();
	}


	if(!isset($_SESSION['usuario'])){
		header("Location: login.php");	
        die();
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reclamacao.css">
	<script type="text/javascript" src="js/main.js"></script>

    <title>Cadastro de Opinião</title>
	
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
	

	<main id="pagCReclamacao"> 

	<div id="tituloFormReclamacao">
		<h1> Preencha os dados para postar sua <br> <strong class="enfase"> opinião </strong></h1>
	</div>

    
	<form method="post" action="processa.php">
		
			<fieldset class="fieldsets">

				<label id="tituloLabel"> Sobre o Produto </label>

				<div class="campo">

					<label for="nomeProduto"> Nome do Produto </label>
					<input type="text" name="nomeProduto" id="campoReclamacao" required placeholder="Conforme a embalagem">  
			
					<label for="nomeFantasia"> Empresa / Fabricante </label>
					<input type="text" name="nomeFantasia" id="campoReclamacao"> 
			
					<label for="nomeCategoria"> Categoria do Produto </label>

					<select id="campoReclamacao" name="nomeCategoria" required>
						<option selected disabled value=""> Selecione </option>
						<option>Skincare</option>
						<option>Para o cabelo</option>
						<option>Para o corpo</option>
						<option>Maquiagens</option>
					</select>
				
					<label for="textoPropaganda"> O que a propaganda prometia? </label>
					<textarea name="textoPropaganda" id="textcampoReclamacao" rows="6"></textarea>
			
					<label for="textoOpiniao"> Qual a sua opinião? </label>
					<textarea name="textoOpiniao" id="textcampoReclamacao" rows="6"></textarea>

				</div>
				
				<div class="botaoPostar">
					<button id="postar" type="submit" name="cadastrarOpiniao"> Postar Reclamação </button>
				</div>

			</fieldset>

		</form>
	
	</main>

    <footer id="rodape">
        <img class="logo2" src="imagens/V.png" width="400px">
    </footer>

<script src="./js/main.js"> </script>   
</body>

</html>