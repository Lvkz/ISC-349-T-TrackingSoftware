<?php
	include 'conexion.php';
	$query = "SELECT nombre_ciudad FROM Paises WHERE nombre='" . $_GET['seleccionID'] . "';";

	conectarBD();
	$resultado = pg_exec($conexion, $query);

	while ($row = pg_fetch_array($resultado)) {
	echo '<option value="' . $row['nombre_ciudad'] . '">' . $row['nombre_ciudad'] . '</option>';
	}
?>