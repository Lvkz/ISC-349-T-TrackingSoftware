<?php
	session_start();
	include 'conexion.php';
	$error = false;

	//Verificar Nombres
	if (empty($_POST["nombres"])){
		$error = true;
	}

	//Verificar Apellidos
	if (empty($_POST["apellidos"])){
		$error = true;
	}

	//Verificar Identificacion
	if(!preg_match("/^[0-9]{3}-[0-9]{7}-[0-9]{1}$/", $_POST['identificacion'])){
		$error = true;
	}

	//Verificar Fecha Nacimiento
	if(!preg_match("/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/", $_POST['fecha_nacimiento'])){
		$error = true;
	}

	if($error){
		$_SESSION['error_formulario'] = true;
		header('Location: crear_cliente.php');
	} else {
		// Leo los datos desde el formulario.
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$identificacion = $_POST['identificacion'];
		$fecha_nacimiento = $_POST['fecha_nacimiento'];
		$sexo = $_POST['sexo'];

		// Inserto los Datos en la base de datos.
		conectarBD();
		$query = "INSERT INTO Clientes VALUES ('" . $identificacion . "', ROW('" . $nombres ."', '" . $apellidos . "', '" . $fecha_nacimiento . "', '" . $sexo . "'))";
		if (pg_send_query($conexion, $query)) {
		  $resultado=pg_get_result($conexion);
		  if ($resultado) {
		    $estado = pg_result_error_field($resultado, PGSQL_DIAG_SQLSTATE);
		    if ($estado==0) {
		      	// En caso de que no haya ningún error.
		      	$_SESSION['error'] = false;
			  	$query = "SELECT oid FROM Clientes WHERE documentoidentidad='" . $identificacion . "'";
			 	$resultado = pg_query($query);
				
				while ($row = pg_fetch_row($resultado)) {
					$_SESSION['codigo_cliente'] = $row[0];
				}

				$_SESSION['nombre_cliente'] = $nombres . ' ' . $apellidos;
				$_SESSION['cliente_creado'] = true;
				header('Location: crear_cliente.php');
		    }
		    else {
		      // some error happened
		      if ($estado=="23505") { // Violación de estado único.
		      	$_SESSION['error_bd'] = true;
		      	header('Location: crear_cliente.php');
		      }
		      else {
		       // process other errors
		      	echo 'Error: ' . $estado . ', vaya a buscar a Google';
		      }
		    }
		  }  
		}
	}
		
	// Leo los datos desde la base de datos.
	// Actualizo los datos de contacto.
?>