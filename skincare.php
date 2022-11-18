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
    <title>Skincare - Venus</title>   
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
        <form class="barraPesquisa" action="pesquisa.php">
            <input type="text" id="pesquise" placeholder="Para Skincare? Empresa?" name="pesquise">
            <button id="pesquise" type="submit"> <img class="lupa" src="imagens/lupa.svg" alt="lupa"> </button>
        </form>   

        <form action="reclamacao.php"> 
            <button class="cadastreReclamacao" type="submit"> Opine! </button>
        </form>

        <form action="skincare.php"> 
            <button class="categoriasButtonEnfase" type="submit"> Skincare </button>
        </form>

        <form action="make.php"> 
            <button class="categoriasButton" type="submit"> Makes </button>
        </form>

        <form action="cabelo.php"> 
            <button class="categoriasButton" type="submit"> Cabelo </button>
        </form>
        
        <form action="corpo.php"> 
            <button class="categoriasButton" type="submit"> Corpo </button>
        </form>

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

    <div id="principal">
            
        <h2>Produtos de Skincare</h2>

    </div>


<?php

    // Se o usuário pesquisar, o sistema criará uma query, que contém o select no banco, com os resultados    

    if(isset ($_GET ['pesquise'])){
            
        $pesquise = $mysqli->real_escape_string($_GET['pesquise']);

        $sql_code ="SELECT usuario.nome, usuario.sobrenome, usuario.pele, usuario.cabelo, opiniao.textoPropaganda, opiniao.textoOpiniao, opiniao.data, opiniao.nomeProduto, opiniao.empresaFabricante, opinião.categoria
                    FROM usuario JOIN opiniao
                    ON opiniao.idUsuario = usuario.id
                    WHERE opiniao.categoria = 'Skincare'
                    AND nomeProduto 
                    LIKE '%$pesquise%' 
                    OR empresaFabricante 
                    LIKE '%$pesquise%'
                    ORDER BY opiniao.id DESC";

        $sql_query = $mysqli->query($sql_code) or die ("ERRO AO CONSULTAR!" . $mysqli->error);

        // Se a busca não retornar nenhum resultado, o sistema mostrará a mensagem

        if($sql_query->num_rows==0){ ?>
    
            <div id="direita">
                <div class="feedUltimasReclamacoes">
                    <h3> Nenhum resultado para a pesquisa "<?php echo "$pesquise" ?>". <br> <strong class = "enfase"> Cadastre sua Opinião!</h3>
                </div>
            </div>
    
<?php   }else{ 

        // Enquanto houverem resultados, o sistema os mostrará através de uma tabela
                    
            while ($dados = mysqli_fetch_assoc($sql_query)) { ?>
    
                <div id="principal">
                        
                    <div class="feed">
                        
                            <table id="post">
                                <tr class="primeira-linha">
                                        <td class = "nome-user" colspan="3">
                                            <div> <img class = "venus" src="imagens/V.png" alt="Venus" width="30px"> </div>

                                            <h1> <?php echo $dados['nome']; ?> <?php echo $dados['sobrenome']; ?> </h1>
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
                                        <p> Cabelo - <?php echo $dados['cabelo']; ?> </p>
                                    </td>
                    
                                    <td class="caracteristicas">
                                        <p> Pele - <?php echo $dados['pele']; ?> </p>
                                    </td>

                                    <td class="caracteristicas">
                                        <p> <?php echo $dados['categoria']; ?> </p>
                                    </td>

                                    <td class="caracteristicas">
                                        <p> <?php echo $dados['data']; ?> </p>
                                    </td>
                                </tr>
                    
                            </table>      
                    </div>
                </div>
                        
<?php 
         
        } } }else{

                // Se o usuário não pesquisar, o sistema mostrará todas as reclamações da categoria selecionada

                $sql_code ="SELECT usuario.nome, usuario.sobrenome, usuario.pele, usuario.cabelo, opiniao.textoPropaganda, opiniao.textoOpiniao, opiniao.data, opiniao.nomeProduto, opiniao.empresaFabricante, opiniao.categoria
                            FROM usuario JOIN opiniao
                            ON opiniao.idUsuario = usuario.id
                            WHERE opiniao.categoria = 'Skincare'
                            ORDER BY opiniao.id DESC";

                $sql_query = $mysqli->query($sql_code) or die ("ERRO AO CONSULTAR!" . $mysqli->error);

                while ($dados = mysqli_fetch_assoc($sql_query)) { ?>
    
                    <div id="principal">
                
                        <div class="feed">
                
                            <table id="post">

                                <tr class="primeira-linha">
                                    <td class = "nome-user" colspan="3">
                                        <div> <img class = "venus" src="imagens/V.png" alt="Venus" width="30px"> </div>

                                        <h1> <?php echo $dados['nome']; ?> <?php echo $dados['sobrenome']; ?> </h1>
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
                                        <p> Cabelo - <?php echo $dados['cabelo']; ?> </p>
                                    </td>
                    
                                    <td class="caracteristicas">
                                        <p> Pele - <?php echo $dados['pele']; ?> </p>
                                    </td>

                                    <td class="caracteristicas">
                                        <p> <?php echo $dados['categoria']; ?> </p>
                                    </td>

                                    <td class="caracteristicas">
                                        <p> <?php echo $dados['data']; ?> </p>
                                    </td>
                                </tr>
                    
                            </table>      
                    </div>
                </div>
                                
            <?php }} ?>

</main>


    <footer>
		<img class="logo2" src="imagens/V.png" width="400px">
	</footer>

</body>
</html>