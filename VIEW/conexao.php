<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

 if ($conn->connect_error){
   die("Falha na conexão do banco: " . $conn->connect_error);
 }