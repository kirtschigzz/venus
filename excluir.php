<?php

include ('conexao.php');
include_once ('perfil.php');

if(!isset($_SESSION)){
    @session_start();
}


if(!isset($_SESSION['usuario'])){
    header("Location: login.php");	
    die();
}

if(isset($_POST['excluir'])){
    
    $sql_code = "DELETE FROM opiniao
                WHERE opiniao.id = '$opiniaoid'";

    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query){ ?>

        <div id="principal">
            <h1>Opinião Deletada com Sucesso!</h1>
            <h1> <a href="perfil.php">Voltar para seu Perfil </a> </h1>
        </div>

<?php die(); }};?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
    <title> Excluir Opinião </title>
</head>
<body>
    
</body>
</html>
