<?php

include ('conexao.php');

if(!isset($_SESSION)){
    @session_start();
}


if(!isset($_SESSION['usuario'])){
    header("Location: login.php");	
    die();
}

if (isset($_SESSION['usuario'])){

    // Se o usuário estiver logado, o sistema criará uma query com as reclamações dele a partir do id obtido na sessão 
    
    $usuario = $mysqli->real_escape_string($_SESSION['usuario']);

    $sql_code = "SELECT opiniao.id, usuario.nome, usuario.sobrenome, usuario.pele, usuario.cabelo, opiniao.textoPropaganda, opiniao.textoOpiniao, opiniao.data, opiniao.nomeProduto, opiniao.empresaFabricante
                FROM usuario JOIN opiniao
                ON opiniao.idUsuario = usuario.id
                WHERE usuario.id = '". $_SESSION['usuario']."'";

    $sql_query = $mysqli->query($sql_code) or die ("ERRO AO CONSULTAR!" . $mysqli->error);

    $dados = mysqli_fetch_assoc($sql_query);

    $opiniaoid = $dados['id'];
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mensagem.css">
    <title> Excluir Opinião </title>
</head>

<body>

    <main>
    <?php   

        if(!isset($_POST['sim'])){ ?>
        
        <div id="principal">
            
            <h1>Deseja mesmo excluir a Opinião?</h1>
            
            <form method="post">
                <button id="botao-sim" type="submit" name="sim"> Sim </button>
            </form>

            <a href="perfil.php"> Não </a>

        </div>

    <?php    die();
            }else{

                $sql_code = "DELETE FROM opiniao
                WHERE opiniao.id = '$opiniaoid'";

                $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

                if($sql_query){ ?>
                    
                    <div id="principal">
                        <h1> Opinião Deletada com Sucesso! </h1>
                        <h1> <a href="perfil.php"> Voltar para seu Perfil </a> </h1>
                    </div>
                    
    <?php       die(); 
                    }} ?>
        
    </main>

</body>

</html>
