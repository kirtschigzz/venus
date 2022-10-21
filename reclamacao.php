<?php
	if (count($_POST)){ 

		include ('conexao.php');
		
		$nomeProduto = $_POST['nomeProduto'];
		$codigo = $_POST['codigo'];
		$empresaFabricante = $_POST['empresaFabricante'];
		$categoria = $_POST['categoria'];
		$propaganda = $_POST['propaganda'];
		$opiniaoCliente = $_POST['opiniaoCliente'];
		
		header('Location: http://localhost/venus/venustcc/venus.php');
		die();
	}

	$sql_code = "INSERT INTO cadastro_opiniao (nomeProduto, codigoBarras, empresaFabricante, categoria, propaganda, opiniaoCliente, dataPost) 
	VALUES ('$nomeProduto', '$codigoBarras', '$empresaFabricante', '$categoria', '$propaganda', '$opinaoCliente', NOW())";

	
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reclamacao.css">
	<script type="text/javascript" src="js/main.js"></script>

    <title>Cadastro de Reclamação</title>
	
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
		<h1> Preencha os dados para postar sua <br> <strong class="enfase">reclamação </strong></h1>
	</div>

    
	<form method="post" action="">
		
			<fieldset class="fieldsets">

				<label id="tituloLabel"> Sobre o Produto </label>

				<div class="campo">

					<label for="nomeProduto"> Nome do Produto </label>
					<input type="text" name="nomeProduto" id="campoReclamacao" required placeholder="Conforme a embalagem" value="<?php if (isset($_POST['nomeProduto'])) echo $_POST['nomeProduto']; ?>"> 
				
					<label for="codigo"> Código de Barras </label>
					<input type="text" name="codigo" id="campoReclamacao" value="<?php if (isset($_POST['codigo'])) echo $_POST['codigo']; ?>"> 
			
					<label for="empresaFabricante"> Empresa / Fabricante </label>
					<input type="text" name="empresaFabricante" id="campoReclamacao" required value="<?php if (isset($_POST['empresaFabricante'])) echo $_POST['empresaFabricante']; ?>"> 
			
					<label for="categoria"> Categoria do Produto </label>

					<select id="campoReclamacao" name="categoria" required value="<?php if (isset($_POST['categoria'])) echo $_POST['categoria']; ?>">
						<option selected disabled value=""> Selecione </option>
						<option>Skincare</option>
						<option>Para o cabelo</option>
						<option>Para o corpo</option>
						<option>Maquiagens</option>
					</select>
				
					<label for="propaganda"> O que a propaganda prometia? </label>
					<textarea name="propaganda" id="textcampoReclamacao" rows="6" value="<?php if (isset($_POST['propaganda'])) echo $_POST['propaganda']; ?>"></textarea>
			
					<label for="opiniaoCliente"> Qual a sua opinião? </label>
					<textarea name="opiniaoCliente" id="textcampoReclamacao" rows="6" value="<?php if (isset($_POST['opiniaoCliente'])) echo $_POST['opiniaoCliente']; ?>"></textarea>

				</div>
				
				<div class="botaoPostar">
					<button id="postar" type="submit"> Postar Reclamação </button>
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