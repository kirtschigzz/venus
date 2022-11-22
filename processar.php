<?php 

// versão final

include('conexao.php');

if(!isset($_SESSION)){
    @session_start();
}


if(!isset($_SESSION['usuario'])){
    header("Location: login.php");	
    die();
}else{
    $usuario = $_SESSION['usuario'];
}

if(isset($_POST['nomeProduto'])){

    $nomeProduto = $_POST['nomeProduto'];
    $empresaFabricante = $_POST['empresaFabricante'];
    $categoria = $_POST['categoria'];
    $textoPropaganda = $_POST['textoPropaganda'];
    $textoOpiniao = $_POST['textoOpiniao'];
    
    $sql_code = "INSERT INTO opiniao 
                        (nomeProduto, empresaFabricante, categoria, textoPropaganda, textoOpiniao, data, idUsuario) VALUES 
                        ('$nomeProduto', '$empresaFabricante', '$categoria', '$textoPropaganda', '$textoOpiniao', NOW(), '$usuario')"; 

    $deuCerto = $mysqli->query($sql_code) or die($mysqli->error);

    if ($deuCerto){
        header('Location: http://localhost/venustcc/mensagem.php');
        unset($_POST);
        die();
    }else{
        header('Location: mensagemErro.php');
        die();
    }
}
    
?>