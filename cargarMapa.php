<?php
      	echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>';
		echo '<script type="text/javascript">';
		echo "function updateMarkerPosition(latLng) {";
		echo "document.getElementById('latitud').value = latLng.lat();";
		echo "document.getElementById('longitud').value = latLng.lng();";
		echo "}";

		echo "function initialize() {";
		echo "var latLng = new google.maps.LatLng(-34.397, 150.644);";

		echo "var map = new google.maps.Map(document.getElementById('gmap_canvas'), {";
		echo "zoom: 8,";
		echo "center: latLng,";
		echo "mapTypeId: google.maps.MapTypeId.ROADMAP";
		echo "});";

		echo "var marker = new google.maps.Marker({";
		echo "position: latLng,";
		echo "map: map,";
		echo "optimized: false,";
		echo "draggable: true";
		echo "});";

		conectarBD();
		$query = "SELECT posicion FROM descripcionrutas WHERE ruta = " . $_SESSION['ruta_actual'];
		conectarBD();
    	$resultado = pg_exec($conexion, $query);

    	if(pg_num_rows($resultado) == 0){
		} else {
			echo "var flightPlanCoordinates = [";

			//WHILE
			$conteo = 1;
			while ($row = pg_fetch_array($resultado)) {
				$posicion = explode(",", $row['posicion']);
				$longitud = trim($posicion[0], "(");
				$latitud = trim($posicion[1], ")");	

				echo "new google.maps.LatLng(" . $longitud . ", $latitud)";
				if ($conteo < pg_num_rows($resultado)) {
					$conteo++;
					echo ', ';
				}
			}
			
			echo "];";

			echo "var flightPath = new google.maps.Polyline({";
			echo "path: flightPlanCoordinates,";
			echo "geodesic: true,";
			echo "strokeColor: '#FF0000',";
			echo "strokeOpacity: 1.0,";
			echo "strokeWeight: 2";
			echo "});";

			echo "flightPath.setMap(map);";
		}

		// Update current position info
		echo "updateMarkerPosition(latLng);";

		// Add dragging event listeners
		echo "google.maps.event.addListener(marker, 'drag', function() {";
		echo "updateMarkerPosition(marker.getPosition());";
		echo "});";
		echo "}";

		// Onload handler to fire off the app
		echo "google.maps.event.addDomListener(window, 'load', initialize);";
		echo "</script>";

      ?>