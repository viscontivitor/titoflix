<?php

/*
Configuração com a estrutura de dados via php estruturado
realizado pelo docente Nerildo Viana
na data d dia 17/10/2022 as 19:35
versao 1.0
*/

// Conecta localhost
$srvRoot = "localhost";
$loginRoot = "root";
$passRoot = "";
$dbNameRoot = "dbstreaming";

$conn = mysqli_connect($srvRoot,$loginRoot,$passRoot,$dbNameRoot)
or die ("Não foi possível se conectar:");

mysqli_set_charset($conn, "utf8");
?>
