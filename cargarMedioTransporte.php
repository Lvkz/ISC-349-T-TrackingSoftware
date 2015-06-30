<?php
	include 'conexion.php';
	$query = "SELECT * FROM (SELECT oid, *, 'camion' AS medio FROM camiones UNION SELECT oid, *, 'avion' AS medio FROM aviones UNION SELECT oid, *, 'barco' AS medio FROM barcos) AS transportacion WHERE medio = '" . $_GET['seleccionID'] . "';";

	conectarBD();
	$resultado = pg_exec($conexion, $query);

	while ($row = pg_fetch_array($resultado)) {
	echo '<option value="' . $row['oid'] . '">' . $row['marca'] . ' - ' . $row['modelo'] . ' - ' . $row['capacidad_peso'] . 'lbs - ' . $row['combustible'] . 'gal ' . '</option>';
	}
?>