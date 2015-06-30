<?php
	session_start();
	include 'conexion.php';

	if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['telefono'])) {
		$_SESSION['error_formulario'] = true;
		header('Location: crear_cliente.php');
	} else {
		//Leo los datos desde el formulario.
		$telefono = $_POST['telefono'];
		$pais = $_POST['pais'];
		$ciudad = $_POST['ciudad'];

		conectarBD();
		$query = "SELECT oid FROM paises WHERE nombre='" . $pais . "' AND nombre_ciudad='". $ciudad . "';";
		$resultado = pg_query($query);

		while ($row = pg_fetch_row($resultado)) {
			$oid = $row['0'];
		}

		// Inserto los Datos en la base de datos.
		$query = "INSERT INTO Contactos VALUES ('" . $telefono . "',' " . $oid . "','" . $_SESSION['codigo_cliente'] . "')";
		if (pg_send_query($conexion, $query)) {
		  $resultado=pg_get_result($conexion);
		  if ($resultado) {
		    $estado = pg_result_error_field($resultado, PGSQL_DIAG_SQLSTATE);
		    if ($estado==0) {
		      // En caso de que no haya ningún error.
			  $_SESSION['cliente_creado'] = true;
		      $_SESSION['error'] = false;
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
		       echo "Error Desconocido";
		      }
		    }
		  } 
		}
	}

		//Busco el oid del pais_ciudad.
		//Inserto los datos en la tabla.	
?>