<?php 
	session_start();
	include 'conexion.php';
	$error = false;

	//Verificar Campos Numéricos
	if (!preg_match("/^[-]?[0-9]+(\.[0-9][0-9]*)*$/", $_POST['longitud'])) {
		$error = true;
	}

	if (!preg_match("/^[-]?[0-9]+(\.[0-9][0-9]*)*$/", $_POST['latitud'])) {
		$error = true;
	}

	//Si están vacíos:
	if (empty($_POST['longitud'])) {
		$error = true;
	}

	if (empty($_POST['latitud'])) {
		$error = true;
	}

	if($error){
		$_SESSION['error_formulario'] = true;
		header('Location: crear_ruta.php');
	} else {
		$ruta = $_POST['ruta'];
		$longitud = $_POST['longitud'];
		$latitud = $_POST['latitud'];
		$vehiculo = $_POST['vehiculo'];
		$medio_transporte = $_POST['medioTransporte'];

		//Preparar SELCET en caso de que sea: avion, barco o camion.
		switch ($vehiculo) {
			case 'avion':
				$query = "INSERT INTO descripcionrutas VALUES(" . $ruta . ", " . 0 . ", POINT(" . $longitud ." , " . $latitud . "), " . $medio_transporte . ", NULL, NULL, 0);";
				break;
			case 'barco':
				$query = "INSERT INTO descripcionrutas VALUES(" . $ruta . ", " . 0 . ", POINT(" . $longitud ." , " . $latitud . "), NULL, " . $medio_transporte . ", NULL, 0);";
				break;
			case 'camion':
				$query = "INSERT INTO descripcionrutas VALUES(" . $ruta . ", " . 0 . ", POINT(" . $longitud ." , " . $latitud . "), NULL, NULL," . $medio_transporte . ", 0);";
				break;	
			default:
				# code...
				break;
		}

		//Ejecutar el query:
		conectarBD();
		if (pg_send_query($conexion, $query)) {
		  $resultado=pg_get_result($conexion);
		  if ($resultado) {
		    $estado = pg_result_error_field($resultado, PGSQL_DIAG_SQLSTATE);
		    if ($estado==0) {
		      // En caso de que no haya ningún error.
			  $_SESSION['cliente_creado'] = true;
		      $_SESSION['error'] = false;
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
		       echo "Error Desconocido: " . $estado;
		      }
		    }
		  } 
		}
	}
?>