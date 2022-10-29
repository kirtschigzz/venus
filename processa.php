<?php

    session_start();

    include "conexao.php";

    $nomeProduto = $_POST['nomeProduto'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $nomeCategoria = $_POST['nomeCategoria'];
    $textoPropaganda = $_POST['textoPropaganda'];
    $textoOpiniao = $_POST['textoOpiniao'];   


    //Verificar se a variavel $_POST['nomeProduto'] existe

    if(isset($_POST['nomeProduto'])){
        
        $sql_code = "INSERT INTO opiniao 
							(textoPropaganda, textoOpiniao, data) VALUES 
							('$textoPropaganda', '$textoOpiniao', NOW())"; 
		
		$deuCerto = $mysqli->query($sql_code) or die($mysqli->error);

		if ($deuCerto){

			header('Location: http://localhost/venustcc/venus.php');
			unset($_POST);
			die();
		}
    }
?>