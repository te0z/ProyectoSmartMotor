<?php 

$host = "localhost";
$user = "root";
$pass = "";
$bd = "isaproyecto";

$conn = new mysqli($host,$user,$pass,$bd);

if ($conn->connect_error) {
	die("Conexion Fallida: ".$conn->connect_error);
}
 ?>