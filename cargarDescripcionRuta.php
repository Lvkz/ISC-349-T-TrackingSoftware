<?php
	session_start();
	include 'conexion.php';
	$_SESSION['ruta_actual'] = $_GET["seleccionID"];
	$query = "SELECT * FROM descripcionrutas WHERE ruta = ". $_GET["seleccionID"];
	conectarBD();
    $resultado = pg_exec($conexion, $query);

     if(pg_num_rows($resultado) == 0){
     	echo "Esta ruta aún no tiene descripción.";
     } else {
     	echo '<thead>';
		echo '<tr>';
		echo '<th>#</th>';
		echo '<th>Longitud</th>';
		echo '<th>Latitud</th>';
		echo '<th>Barco</th>';
		echo '<th>Avión</th>';
		echo '<th>Camión</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		echo '<?php ';

		  $resultado = pg_exec($conexion, $query);
		  $conteo = 1;
		  while ($row = pg_fetch_array($resultado)) {
		    $posicion = explode(",", $row['posicion']);
		    echo "<tr>";
		    echo "<td>" . $conteo++ . "</td>";

		    $trimmed = trim($posicion[0], "(");
		    echo "<td>" . $trimmed . "</td>";

		    $trimmed = trim($posicion[1], ")");
		    echo "<td>" . $trimmed . "</td>";

		    echo "<td>" . $row['ruta'] . "</td>";
		    echo "<td>" . $row['ruta'] . "</td>";
		    echo "<td>" . $row['ruta'] . "</td>";
		    echo "</tr>";
		  }

		echo '</tbody>';
	}	
?>