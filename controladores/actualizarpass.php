<?php 
session_start();

$usuario = $_SESSION['usuario'];
$pass_actual = $_REQUEST['passActual'];
$pass_nueva = $_REQUEST['passNueva'];

include('../controladores/conexion.php');

$sql = "UPDATE cliente SET password = '". $pass_nueva . "' WHERE password = '". $pass_actual . "'";
$result = $conn->query($sql);

header('Location ../vista');
 ?>