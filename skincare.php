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
    <link rel="stylesheet" type="text/css" href="css/categorias.css">
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
        <a class="menu-item" href="index.php" target="_self"> Home </a>
        <a class="menu-item" href="venus.php" target="_self"> Venus </a>
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
            
            <h2>Produtos de Skincare</h2>

        <div class="botoes">

            <form class="barraPesquisa">
                <input type="text" id="pesquise" placeholder="Produto / Empresa" name="pesquise">
                <button id="pesquise" type="submit"> <img class="lupa" src="imagens/lupa.svg" alt="lupa"> </button>
            </form>

            <section class="cadastre">
                <form action="reclamacao.php"> 
                    <button class="cadastreReclamacao" type="submit"> Cadastre uma Reclamação </button>
                </form>
            </section>
    
        </div>
        </div>


        <?php 
        
        if(isset ($_GET ['pesquise'])){
            
            $pesquise = $mysqli->real_escape_string($_GET['pesquise']);

            $sql_code = "SELECT usuario.nome, usuario.sobrenome, usuario.pele, usuario.cabelo, opiniao.textoPropaganda, opiniao.textoOpiniao, opiniao.data, opiniao.nomeProduto, opiniao.empresaFabricante
                        FROM usuario JOIN opiniao
                        ON opiniao.idUsuario = usuario.id
                        WHERE opiniao.categoria = 'Skincare'
                        AND nomeProduto 
                        LIKE '%$pesquise%' 
                        OR empresaFabricante 
                        LIKE '%$pesquise%'";

            $sql_query = $mysqli->query($sql_code) or die ("ERRO AO CONSULTAR!" . $mysqli->error);

                if($sql_query->num_rows==0){ ?>
    
                    <div id="direita">
                    <div class="feedUltimasReclamacoes">
                        <h3> Nenhum resultado para a pesquisa "<?php echo "$pesquise" ?>". <br> <strong class = "enfase"> Cadastre sua Opinião!</h3>
                    </div>
                    </div>
    
                <?php }else{ 
                    
                    while ($dados = mysqli_fetch_assoc($sql_query)) { ?>
    
                        <div id="direita">
                        
                        <div class="feedUltimasReclamacoes">
                        
                            <h3> Resultado para a pesquisa "<?php echo "$pesquise" ?>"</h3>
                        
                            <table id="postOpinioes">
                                    <tr>
                                        <td colspan="3" class="nomeUser">
                                        <img src="imagens/V.png" alt="Venus" width="30px"> <h1> <?php echo ($dados['nome'] . $dados['sobrenome']) ; ?> </h1>
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
                                            <p> <?php echo $dados['data']; ?> </p>
                                        </td>
                                    </tr>
                        
                            </table>      
                        </div>
                        </div>
                        
        <?php 
        
        } } }else{

            $sql_code = "SELECT usuario.nome, usuario.sobrenome, usuario.pele, usuario.cabelo, opiniao.textoPropaganda, opiniao.textoOpiniao, opiniao.data, opiniao.nomeProduto, opiniao.empresaFabricante
                            FROM usuario JOIN opiniao
                                ON opiniao.idUsuario = usuario.id
                                    WHERE opiniao.categoria = 'Skincare'";

            $sql_query = $mysqli->query($sql_code) or die ("ERRO AO CONSULTAR!" . $mysqli->error);

            while ($dados = mysqli_fetch_assoc($sql_query)) { ?>
    
                <div id="direita">
                
                <div class="feedUltimasReclamacoes">
                
                    <table id="postOpinioes">
                            <tr>
                                <td colspan="3" class="nomeUser">
                                <img src="imagens/V.png" alt="Venus" width="30px"> <h1> <?php echo ($dados['nome'] . $dados['sobrenome']) ; ?> </h1>
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