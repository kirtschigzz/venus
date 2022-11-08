<?php

    if (isset($_POST['email'])){

        //Se houver o post email, o sistema criar uma query para postar as informações no banco de dados

        include ('conexao.php');

        $email = $_POST ['email'];

        //Senha criptografada pelo hash do php
        
        $senha = password_hash($_POST ['senha'], PASSWORD_DEFAULT);
        $nome = $_POST ['nome'];
        $sobrenome = $_POST ['sobrenome'];
        $genero = $_POST ['genero'];
        $pele = $_POST ['pele'];
        $cabelo = $_POST ['cabelo'];

        $deuCerto = $mysqli->query("INSERT INTO usuario (email, senha, nome, sobrenome, pele, cabelo, genero) 
                                    VALUES ('$email', '$senha','$nome','$sobrenome', '$pele', '$cabelo', '$genero')");

        if ($deuCerto){
			header("Location: login.php");
			unset($_POST);
			die();
		}else{
            echo "erro";        
        }}  
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

<?php   if (!isset($_SESSION['usuario'])){ ?>

            <a class="menu-item" href="login.php" target="_self"> Login </a>

<?php   } ?>

<?php   if (isset($_SESSION['usuario'])){ ?>

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

                    <label id="tituloLabel"> Dados Pessoais</label>

                        <div class="campo">

                            <label for="nome"> Nome </label>
                            <input type="text" name="nome" required>
                        
                            <label for="sobrenome">Sobrenome </label>
                            <input type="text" name="sobrenome" required>

                            <label for="genero"> Gênero </label>

                            <select name="genero" required>
                                <option selected disabled value=""> Selecione </option>
                                <option> Feminino </option>
                                <option> Masculino</option>
                                <option> Prefiro não informar </option>	
                            </select>	

                        </div>

                </fieldset>

                <fieldset>

                    <label id="tituloLabel"> Suas Características</label>

                        <div class="campo">

                            <label for="pele"> Tipo de Pele </label>

                                <select name="pele">
                                    <option selected disabled value=""> Selecione </option>
                                    <option>Seca</option>
                                    <option>Mista-Seca</option>
                                    <option>Oleosa</option>
                                    <option>Mista-Oleosa</option>
                                    <option>Mista</option>
                                </select>
                        
                            <label for="cabelo"> Tipos de Cabelo </label>
                            
                                <select name="cabelo" required>
                                    <option selected disabled value=""> Selecione </option>
                                    <option>Liso</option>
                                    <option>Ondulado</option>
                                    <option>Cacheado</option>
                                    <option>Crespo</option>
                                </select>
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


