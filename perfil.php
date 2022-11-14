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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
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
            <!-- Definindo as opções que os usuários terão no menu de nav -->
            
            <a class="menu-item" href="index.php" target="_self"> Home </a>
            <a class="menu-item" href="venus.php" target="_self"> Venus </a>

    <?php   if (!isset($_SESSION['usuario'])){ 
            // Se o usuário não estiver logado, aparecerá a opção de Login ?>
                <a class="menu-item" href="login.php" target="_self"> Login </a>
    <?php   } ?>

    <?php   if (isset($_SESSION['usuario'])){ 
            // Se o usuário estiver logado, aparecerá a opção de Perfil ?>

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

    <div id="feed"><h1 class="titulo"> Olá :) Aqui estão suas Opiniões </h1></div>

<?php   if (isset($_SESSION['usuario'])){

            // Se o usuário estiver logado, o sistema criará uma query com as reclamações dele a partir do id obtido na sessão 
            
            $usuario = $mysqli->real_escape_string($_SESSION['usuario']);

            $sql_code = "SELECT opiniao.id, usuario.nome, usuario.sobrenome, usuario.pele, usuario.cabelo, opiniao.textoPropaganda, opiniao.textoOpiniao, opiniao.data, opiniao.nomeProduto, opiniao.empresaFabricante, opiniao.categoria
                        FROM usuario JOIN opiniao
                        ON opiniao.idUsuario = usuario.id
                        WHERE usuario.id = '". $_SESSION['usuario']."'";

            $sql_query = $mysqli->query($sql_code) or die ("ERRO AO CONSULTAR!" . $mysqli->error);
            
            if($sql_query->num_rows==0){ 
            // Se a query não encontrar nenhuma reclamação, mostrará essa mensagem ?>
                <div>
                    <div class="feedUltimasReclamacoes">
                        <h3> Você ainda não opinou :( </h3>
                    </div>
                </div>
    
<?php       }else{
            
            // Enquanto a query encontrar resultados, os mostrará em uma tabela 
                    
                while ($dados = mysqli_fetch_assoc($sql_query)) { 

                    $opiniaoid = $dados['id']; ?>

                        <div id="feed">
                            
                            <div class="feedUltimasReclamacoes">
                            
                                <table id="postOpinioes">
                                    
                                    <tr class="primeira-linha">
                                        <td class = "nome-user" colspan="3">
                                            <div> <img class = "venus" src="imagens/V.png" alt="Venus" width="30px"> </div>

                                            <h1> <?php echo $dados['nome']; ?> <?php echo $dados['sobrenome']; ?> </h1>
                                        
                                            <div class="botao-excluir">
                                                <form action="excluir.php" method="post">
                                                    <button class="excluir" name="excluir" type="submit"> <img src="imagens/lixo.png" width="25px"> </button>
                                                </form>
                                            </div>
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
                
                        <?php if(isset($_POST['excluir'])){
    
                            $sql_code = "DELETE FROM opiniao
                                        WHERE opiniao.id = '$opiniaoid'";

                            $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

                            if($sql_query){ ?>

                                <div id="feed">
                                    <h1>Opinião Deletada com Sucesso!</h1>
                                    <h1> <a href="perfil.php">Voltar para seu Perfil </a> </h1>
                                </div>

                        <?php die(); }};?>
                        
<?php 
        
        } } } ?>

</main>

    <footer>
		<img class="logo2" src="imagens/V.png" width="400px">
	</footer>

</body>
</html>