<?php

// versão final

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/excluir.css">
    <title>Excluir a Opinião</title>
</head>

<body>

    <main>

    <?php if(!isset($_POST['sim'])) { ?>

        <h1>Deseja mesmo excluir a Opinião?</h1>

        <div class="opcoes">
        
            <form method="post">
                <button id="botao-sim" type="submit" name="sim"> Sim </button>
            </form>

            <a href="perfil.php"> Não </a>

        </div>

        <?php }else{ 
            
                include('conexao.php');

                $opiniaoid = intval($_GET['id']);
            
                $sql_opiniao = "SELECT *
                                FROM opiniao WHERE opiniao.id = '$opiniaoid'";
            
                $query_opiniao = $mysqli->query($sql_opiniao) or die($mysqli->error);
            
                $opiniao = $query_opiniao->fetch_assoc();
            
                $sql_code = "DELETE FROM opiniao WHERE opiniao.id = '$opiniaoid'";
            
                $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
            
                if($sql_query) { ?>

                    <div id="principal">
                        <h1> Opinião Deletada com Sucesso! </h1>
                        <h1> <a href="perfil.php"> Voltar para seu Perfil </a> </h1>
                    </div>
            
                    <?php
                    die();
                }
        }?>

    </main>

</body>
</html>