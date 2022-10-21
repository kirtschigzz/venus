<?php

$host = "localhost";
$db = "venusteste";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno){
    die ("FALHA NA CONEXÃO");
}