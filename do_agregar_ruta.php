<?php
	session_start();
	include 'conexion.php';
	$error = false;

	//Verificar Identificacion
	if(!preg_match("/^([0]+[1-9]|10|11|12):[0-5][0-9]\040(AM|PM)$/", $_POST['hora_salida'])){
		$error = true;
	}

	//Verificar Horas Llegada & Salida
	if (empty($_POST["hora_salida"])){
		$error = true;
	}

	if (empty($_POST["hora_llegada"])){
		$error = true;
	}

	$hora_llegada_con_formato = date("H:i:s", strtotime($_POST['hora_llegada']));
	$hora_salida_con_formato = date("H:i:s", strtotime($_POST['hora_salida']));


	//Comparar que la hora de salida, no sea menor a la hora de llegada.
	if($hora_salida_con_formato > $hora_llegada_con_formato) {
		$error = true;	
	}

	$ubicacion_origen = $_POST['pais_origen'].$_POST['ciudad_origen'];
	$ubicacion_destino = $_POST['pais_destino'].$_POST['ciudad_destino'];

	if(strcmp($ubicacion_origen, $ubicacion_destino) == 0 ){
		$error = true;
	}

	if($error) {
		$_SESSION['error_formulario'] = true;
		header('Location: crear_ruta.php');

	} else {

		conectarBD();
		$query_origen = "SELECT oid FROM paises WHERE nombre = '" . $_POST['pais_origen'] . "' AND nombre_ciudad = '" . $_POST['ciudad_origen'] . "'";
		$query_destino = "SELECT oid FROM paises WHERE nombre = '" . $_POST['pais_destino'] . "' AND nombre_ciudad = '" . $_POST['ciudad_destino'] . "'"; 
		$query = "INSERT INTO rutas VALUES('" . $hora_salida_con_formato . "','" .$hora_llegada_con_formato . "', (" . $query_origen . "), (" . $query_destino . "))";
		if (pg_send_query($conexion, $query)) {
		  $resultado=pg_get_result($conexion);
		  if ($resultado) {
		    $estado = pg_result_error_field($resultado, PGSQL_DIAG_SQLSTATE);
		    if ($estado==0) {
		      	// En caso de que no haya ningún error.
		      	$_SESSION['error'] = false;
		      	$query = "INSERT INTO rutas VALUES('" . $hora_salida_con_formato . "','" .$hora_llegada_con_formato . "'," . $ubicacion_origen . "," . $ubicacion_destino . ")";
				$resultado = pg_query($query);
				
				while ($row = pg_fetch_row($resultado)) {
					$_SESSION['codigo_ruta'] = $row[0];
				}

				$_SESSION['cliente_creado'] = true;
				header('Location: crear_ruta.php');
		    }
		    else {
		      // some error happened
		      if ($estado=="23505") { // Violación de estado único.
		      	$_SESSION['error_bd'] = true;
		      	header('Location: crear_ruta.php');
		      }
		      else {
		       // process other errors
		      	echo 'Error: ' . $estado . ', vaya a buscar a Google';
		      }
		    }
		  }  
		}
	}

	//Revisar que todos los datos se pasen.
	//Agregar Datos en la base de datos.
?>