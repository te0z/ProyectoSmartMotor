<?php 

include('../controladores/conexion.php');

function convFecha($fecha){
	$date = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', $fecha)));
	
	echo $date;
}

/**
 * Clase Cliente
 */
class Cliente
{
	public function mostrar($con, $usuario)
	{
		try{
			$sql = "SELECT nombre, apellido, correo FROM clientes
					WHERE usuario = '" . $usuario . "'";
			$result = $con->query($sql);
			$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

			return $return;

		}catch(Exception $e){
			throw $e;
			
		}
	}

	public function mostrarNombre($con, $usuario){
		try{
			$sql = "SELECT nombre FROM clientes
					WHERE usuario = '" . $usuario . "'";
			$result = $con->query($sql);
			$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

			foreach ($return as $row) {
				$nombre = $row['nombre'];
			}

			return $nombre;

		}catch(Exception $e){
			throw $e;
			
		}
	}

	public function mostrarApellido($con, $usuario){
		try{
			$sql = "SELECT apellido FROM clientes
					WHERE usuario = '" . $usuario . "'";
			$result = $con->query($sql);
			$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

			foreach ($return as $row) {
				$apellido = $row['apellido'];
			}

			return $apellido;

		}catch(Exception $e){
			throw $e;
			
		}
	}

	public function mostrarCorreo($con, $usuario){
		try{
			$sql = "SELECT correo FROM clientes
					WHERE usuario = '" . $usuario . "'";
			$result = $con->query($sql);
			$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

			foreach ($return as $row) {
				$correo = $row['correo'];
			}

			return $correo;

		}catch(Exception $e){
			throw $e;
			
		}
	} 

	public function cambiarPass($con,$usuario,$passActual,$passNueva)
	{
		try{
			$sql = "SELECT password FROM clientes
					WHERE usuario = '" . $usuario . "'";
			$result = $con->query($sql);
			$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

			if($return['password'] == $passActual){
				$pass = "UPDATE clientes SET password = '" . $passNueva . "'";
				$result = $con->query($pass);

				if (!$result) {
					echo "<div class='alert alert-danger' role='alert'>No se pudo cambiar la Contraseña</div>";
				} else {
					header('Location ../vista');
				}
			} else {
				echo "<div class='alert alert-danger' role='alert'>Contraseña Actual Incorrecta</div>";
			}

		}catch(Exception $e){
			throw $e;
			
		}
	}

	public function todosLosDatos($con,$equipo){
		try {
			$sql = "SELECT temp, amp, volt, hr FROM registros WHERE equipo = '" . $equipo. "' ORDER BY hr DESC";
			$result = $con->query($sql);
			$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

			return $return;

		} catch (Exception $e){
			throw $e;
		}
	}

	public function datosPorFecha($con,$equipo,$desde,$hasta){
		try{

			$sql = "SELECT temp, amp, volt, hr 
					FROM registros 
					WHERE equipo = '" . $equipo . "' AND hr BETWEEN '" . $desde . "' AND '" . $hasta . "'
					ORDER BY hr DESC";

			$result = $con->query($sql);

			$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

			return $return;
				
		}catch(Exception $e){
			throw $e;
		}
	}
}


 ?>