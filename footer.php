
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>

      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

      <!-- Sparkline graphs -->
      <script src="js/sparkline.js"></script>

      <!-- Data tables -->
      <script src="js/jquery.datatables.js"></script>

      <!-- Date Range -->
      <script src="js/daterange/moment.js"></script>
      <script src="js/daterange/daterangepicker.js"></script>

      <!-- Animated Right Sidebar -->
      <script src="js/slidebars.js"></script>

      <!-- JVector Map -->
      <script src="js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="js/jvectormap/jquery-jvectormap-usa.js"></script>

      <!-- Datepicker-->
      <script src="js/bootstrap-datepicker.js"></script>
     
      <!-- Select2 -->
      <script src="js/select2.js"></script>

      <!-- Bootstrap TimePicker-->
      <script src="js/bootstrap-timepicker.js"></script>

      <!-- Custom JS -->
      <script src="js/custom.js"></script>
      <script src="js/custom-index.js"></script>

      <!-- Custom -->
      <script type="text/javascript">
            function updateClock ( )
            {
              var currentTime = new Date ( );
              var dd = currentTime.getDate();
              var mm = currentTime.getMonth(); //January is 0!
              var yyyy = currentTime.getFullYear();

              var currentHours = currentTime.getHours ( );
              var currentMinutes = currentTime.getMinutes ( );
              var currentSeconds = currentTime.getSeconds ( );

              // Pad the minutes and seconds with leading zeros, if required
              currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
              currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

              // Choose either "AM" or "PM" as appropriate
              var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

              // Convert the hours component to 12-hour format if needed
              currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

              // Convert an hours component of "0" to "12"
              currentHours = ( currentHours == 0 ) ? 12 : currentHours;

              switch(mm){
                  case (0):
                  mes = "Enero";
                  break;
                  case (1):
                  mes = "Febrero";
                  break;
                  case (2):
                  mes = "Marzo";
                  break;
                  case (3):
                  mes = "Abril";
                  break;
                  case (4):
                  mes = "Mayo";
                  break;
                  case (5):
                  mes = "Junio";
                  break;
                  case (6):
                  mes = "Julio";
                  break;
                  case (7):
                  mes = "Agosto";
                  break;
                  case (8):
                  mes = "Septiembre";
                  break;
                  case (9):
                  mes = "Octubre";
                  break;
                  case (10):
                  mes = "Noviembre";
                  break;
                  case (11):
                  mes = "Diciembre";
                  break;
              }

              today = mes + ' ' + dd +', ' + yyyy;

              // Compose the string for display
              var currentTimeString = today + ' | ' + currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

              // Update the time display
              document.getElementById("clock").firstChild.nodeValue = currentTimeString;
            }
      </script>

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
				$latitud = trim($posicion[0], "(");
				$longitud = trim($posicion[1], ")");	

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

    </body>
  </html>