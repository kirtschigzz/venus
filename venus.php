<?php
// versão final

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
    <title>Maquiagens - Venus </title>    
</head>

<body>

<header>
    
    <!-- Somente se o usuário estiver logado, a página Venus poderá ser acessada -->

    <?php if (isset($_SESSION['usuario'])){ ?>
    <a class="menu-item" href="venus.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
    <?php } ?>

    <?php if (!isset($_SESSION['usuario'])){ ?>
    <a class="menu-item" href="index.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
    <?php } ?>
    
        <nav>

            <form action="pesquisa.php" class="barraPesquisa">
                <input type="text" id="pesquise" placeholder="Produto? Empresa?" name="pesquise">
                <button id="pesquise" type="submit"> <img class="lupa" src="imagens/lupa.svg" alt="lupa"> </button>
            </form>   

            <a class="venus-item" href="reclamacao.php"> Opine! </a>
        
            <a class="categorias-item" href="skincare.php"> Skincare </a>

            <a class="categorias-item" href="make.php"> Makes </a>

            <a class="categorias-item" href="cabelo.php"> Cabelo </a>
            
            <a class="categorias-item" href="corpo.php"> Corpo </a>

            <!-- Definindo as opções do menu de navegação que o usuário logado terá -->

            <a class="venus-item" href="venus.php" target="_self"> Venus </a>

            <!-- Se o usuário não estiver logado, terá somente a opção da página Login -->

            <?php if (!isset($_SESSION['usuario'])){ ?>
            <a class="menu-item" href="login.php" target="_self"> Login </a>
            <?php } ?>

            <!-- Se o usuário estiver logado, a opção de entrar no seu perfil e de sair serão mostradas -->

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

            <h2> Últimas Interações </h2>


        <?php 
        
            if(isset ($_SESSION ['usuario'])){

            // O sistema mostra as últimas opiniões

            $sql_code ="SELECT opiniao.id, usuario.nome, usuario.sobrenome, usuario.pele, usuario.cabelo, opiniao.textoPropaganda, opiniao.textoOpiniao, opiniao.data, opiniao.nomeProduto, opiniao.empresaFabricante, opiniao.categoria
                        FROM usuario JOIN opiniao
                        ON opiniao.idUsuario = usuario.id
                        ORDER BY opiniao.id DESC LIMIT 10";

            $sql_query = $mysqli->query($sql_code) or die ("ERRO AO CONSULTAR!" . $mysqli->error);

            while ($dados = mysqli_fetch_assoc($sql_query)) { ?>
    
                <div id="principal">
                
                    <div class="feed">
                
                        <table id="post">
                            <tr>
                                <td colspan="3" class="nomeUser">
                                <img src="imagens/V.png" alt="Venus" width="30px"> <h1> <?php echo $dados['nome']; ?> <?php echo $dados['sobrenome']; ?> </h1>
                                </td>
                            </tr>
                
                            <tr>
                                <td class="nomeProduto">
                                     <p> <?php echo $dados['nomeProduto']; ?>  (  <?php echo $dados['empresaFabricante']; ?> ) <p>
                                </td>
                            </tr>
                
                            <tr>
                                <td class="textoPropaganda">
                                    <h1> <i>"<?php echo $dados['textoPropaganda']; ?>" </i> </h1> 
                                </td>
                            <tr>
                
                            <tr> 
                                <td class="textoOpiniao">
                                    <p> <?php echo $dados['textoOpiniao']; ?> </p>
                                </td>
                            </tr>
                
                            <tr>
                                <td class="caracteristicas">
                                    <p> Cabelo: <?php echo $dados['cabelo']; ?> </p>
                                </td>
                
                                <td class="caracteristicas">
                                    <p> Pele: <?php echo $dados['pele']; ?> </p>
                                </td>

                                <td class="caracteristicas">
                                        <p> <?php echo $dados['categoria']; ?> </p>
                                    </td>

                                <td class="caracteristicas">
                                    <p> <?php echo date ("d/m/Y", strtotime ($dados['data'])); ?> </p>
                                </td>
                            </tr>
                
                        </table>      
                    </div>
                </div>

                
        <?php }}?>

</main>


    <footer>
		<img class="logo2" src="imagens/V.png" width="400px">
	</footer>

</body>
</html>