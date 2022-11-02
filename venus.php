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
    <link rel="stylesheet" type="text/css" href="css/venus.css">
    <script type="text/javascript" src="js/main.js"></script>

    <title>Venus</title>
    
</head>

<body>
    <header>
    
    <?php if (isset($_SESSION['usuario'])){ ?>
    <a class="menu-item" href="venus.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
    <?php } ?>

    <?php if (!isset($_SESSION['usuario'])){ ?>
    <a class="menu-item" href="index.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
    <?php } ?>
    
        <nav>
            <section class="barraPesquisa">
                <input type="text" id="pesquise" placeholder="Produto / Empresa">
                <button id="pesquise"> <img class="lupa" src="imagens/lupa.svg" alt="lupa"> </button>
            </section>
            <a class="menu-item" href="index.php" target="_self"> Home </a>
            <?php if (!isset($_SESSION['usuario'])){ ?>
            <a class="menu-item" href="login.php" target="_self"> Login </a>
            <?php } ?>
            <?php if (isset($_SESSION['usuario'])){ ?>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Perfil</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="logout.php">Sair</a>
                </div>
            </div>
            <?php } ?>
        </nav>
    
    </header>


    <main>

        <div id="esquerda">

        <div class="botoes">
            <section class="cadastre">
                <form action="reclamacao.php"> 
                    <button class="cadastreReclamacao" type="submit"> Cadastre uma Reclamação </button>
                </form>
            </section>

            <form action="skincare.php"> 
                <button class="categoriasButton" type="submit"> Skincare </button>
            </form>
            <form action="make.php"> 
                <button class="categoriasButton" type="submit"> Maquiagens </button>
            </form>
            <form action="cabelo.php"> 
                <button class="categoriasButton" type="submit"> Para o Cabelo </button>
            </form>
            <form action="corpo.php"> 
                <button class="categoriasButton" type="submit"> Para o Corpo </button>
            </form>

        </div>
        </div>


        <div id="direita">

        <div class="feedUltimasReclamacoes">

            <h3>Últimas Interações</h3>
 
            <table id="postOpinioes">
                <tr>
                    <td colspan="3" class="nomeUser">
                       <img src="imagens/V.png" alt="Venus" width="30px"> <h1>Barbara Kirtschig</h1>
                    </td>
                </tr>

                <tr>
                    <td class="nomeProduto">
                        <p>Nome do Produto</p> (<p>empresaFabricante</p>)
                    </td>
                </tr>
    
                <tr>
                    <td class="textoPropaganda">
                        <h1> <i>"A propaganda dizia que o produto era a prova dágua" </i> </h1> 
                    </td>
                <tr>

                <tr> 
                    <td class="textoOpiniao">
                        <p> Molhei um pouco o rosto e o produto derreteu inteiro. Decepcionada! </p>
                    </td>
                </tr>

                <tr>
                    <td class="caracteristicas">
                        <p> Tipo da Pele: </p>
                    </td>

                    <td class="caracteristicas">
                        <p> Tipo do Cabelo: </p>
                    </td>
                    <td class="caracteristicas">
                        <p> data </p>
                    </td>
                </tr>

            </table>
            
        </div>

    </main>

    <footer>
		<img class="logo2" src="imagens/V.png">
	</footer>

</body>
</html>