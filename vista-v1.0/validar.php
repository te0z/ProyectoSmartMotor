<?php 

include('../controladores/conexion.php');

try{
	$usuario = $_POST['nnombre'];
	$password = $_POST['npassword'];

	if(empty($usuario) || empty($password)){
		header("Location: index.php");
		exit();
	}

	$sql = "SELECT usuario, password FROM clientes WHERE usuario = '" . $usuario . "' ";
	$result = $conn->query($sql);

	//$result = mysqli_query("SELECT * from usuarios where usuario='" . $usuario . "'");

	if($result->num_rows > 0){
		if($row['password'] = $password){
			session_start();
			$_SESSION['usuario'] = $usuario;

			header("Location: inicio.php");
		} 
	} else {
		echo "Usuario o Contraseña Incorrecta";
		header("Location: index.php");
		exit();
	}
} catch(Exception $e){
	throw $e;	
}

 ?>
