<?php
	session_start();
	include 'conexion.php';
	$error = false;

	if (!preg_match("/^[0-9]+(\.[0-9][0-9]*)*$/", $_POST['velocidad'])) {
		$error = true;
	}

	if (!preg_match("/^[0-9]+(\.[0-9][0-9]*)*$/", $_POST['capacidad'])) {
		$error = true;
	}

	if(!preg_match("/^[0-9]+(\.[0-9][0-9]*)*$/", $_POST['tripulacion'])) {
		$error = true;
	}

	if (empty($_POST['modelo'])) {
		$error = true;
	}

	if (empty($_POST['marca'])) {
		$error = true;
	}

	if (!preg_match("/^[0-9]+(\.[0-9][0-9]*)*$/", $_POST['combustible'])) {
		$error = true;
	}

	if (empty($_POST['numero_serie'])) {
		$error = true;
	}

	if (!preg_match("/^[1-3]$/", $_POST['tipo_transporte'])) {
		$error = true;
	}

	if($error){
		$_SESSION['error_formulario'] = true;
		header('Location: transporte.php');
	} else {
		$velocidad_media = $_POST['velocidad'];
		$capacidad_peso = $_POST['capacidad'];
		$tripulacion = $_POST['tripulacion'];
		$modelo = $_POST['modelo'];
		$marca = $_POST['marca'];
		$combustible = $_POST['combustible'];
		$numero_serie = $_POST['numero_serie'];
		$tipo_transporte = $_POST['tipo_transporte'];

		switch ($tipo_transporte) {
			case 1:
				$query = "INSERT INTO barcos VALUES (" . $velocidad_media . "," . $capacidad_peso  . ", '" . $modelo . "', ". $tripulacion . ", " . $combustible . ", '" . $marca . "', '" . $numero_serie . "');";
				break;
			case 2:
				$query = "INSERT INTO aviones VALUES (" . $velocidad_media . "," . $capacidad_peso .  ", '" . $modelo . "', ". $tripulacion . ", " . $combustible . ", '" . $marca . "', '" . $numero_serie . "');";
				break;
			case 3:
				$query = "INSERT INTO camiones VALUES (" . $velocidad_media . "," . $capacidad_peso . ", '" . $modelo . "', ". $tripulacion . ", " . $combustible . ", '" . $marca . "', '" . $numero_serie . "');";
				break;
			default:
				//Nunca va a entrar a aquí.
				break;
		}


		// Inserto los Datos en la base de datos.
		conectarBD();
		if (pg_send_query($conexion, $query)) {
		  $resultado=pg_get_result($conexion);
		  if ($resultado) {
		    $estado = pg_result_error_field($resultado, PGSQL_DIAG_SQLSTATE);
		    if ($estado==0) {
		      // En caso de que no haya ningún error.
			  $_SESSION['cliente_creado'] = true;
		      $_SESSION['error'] = false;
		      header('Location: transporte.php');
		    }
		    else {
		      // some error happened
		      if ($estado=="23505") { // Violación de estado único.
		      	$_SESSION['error_bd'] = true;
		      	header('Location: transporte.php');
		      }
		      else {
		       // process other errors
		       echo "Error Desconocido: " . $estado;
		      }
		    }
		  } 
		}
	}
?>