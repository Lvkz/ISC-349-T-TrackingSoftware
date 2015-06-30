<?php 
	session_start();
	include 'conexion.php';

	$query = "SELECT (SELECT nombre || ' - ' || nombre_ciudad FROM paises WHERE oid = ciudad_origen), (SELECT nombre || ' - ' || nombre_ciudad FROM paises WHERE oid = ciudad_destino) FROM rutas WHERE oid= " . $_GET['seleccionID'];
	 conectarBD();

	$resultado = pg_exec($conexion, $query);
	while ($row = pg_fetch_array($resultado)) {
		echo $_SESSION['ruta_actual'] = $row['0'] . " -> " . $row['1'];
	}
?>