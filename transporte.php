<?php $thisPage = transporte ?>
<?php include 'header.php' ?>
<?php include 'right_sidebar.php' ?>
<?php include 'left_sidebar.php' ?>

<!-- Main Container start -->
<div class="dashboard-wrapper">

  <div class="container">

    <!-- Page title start -->
    <div class="row page-title">
      
      <div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
        <h2>Page Title</h2>
        <ul class="breadcrumb">
          <li>Home</li>
          <li>Current page</li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-3 hidden-sm hidden-xs">
        <div id="reportrange">
          <i class="icon-calendar"></i>
          <span id="clock">&nbsp;</span>
        </div>
      </div>
    </div>
    <!-- Page title end -->

    <div class="row sortable">
      <div class="col-md-3 col-sx-12 col-sm-3">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-list"></i>
            <h3 class="panel-title">Agregar Medio</h3>
          </div>
          <div class="panel-body">
            <form class="form" method="post" action="do_agregar_transporte.php">
                <div class="form-group">
                  <label for="marca" class="control-label">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca Vehículo">
                </div>

                <div class="form-group">
                  <label for="modelo" class="control-label">Modelo</label>
                  <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo Vehículo">
                </div>

                <div class="form-group">
                  <label for="numero_serie" class="control-label">Número de Serie</label>
                  <input type="text" class="form-control" id="numero_serie" name="numero_serie" placeholder="Número de Serie">
                </div>

                <div class="form-group">
                  <label for="tripulacion" class="control-label">Tripulación</label>
                  <input type="text" class="form-control" id="tripulacion" name="tripulacion" placeholder="Cantidad de Personal">
                </div>

                <div class="form-group">
                  <label for="combustible" class="control-label">Combustible</label>
                  <input type="text" class="form-control" id="combustible" name="combustible" placeholder="Cantidad de Combustible (galones)">
                </div>

                <div class="form-group">
                  <label for="velocidad" class="control-label">Velocidad Media</label>
                  <input type="text" class="form-control" id="velocidad" name="velocidad" placeholder="Velocidad Media (km/h)">
                </div>

                <div class="form-group">
                  <label for="capacidad" class="control-label">Capacidad de Carga</label>
                  <input type="text" class="form-control" id="capacidad" name="capacidad" placeholder="Peso (libras)">
                </div>

                <div class="form-group">
                  <label for="-" class="control-label">Tipo de Transporte</label>
                  <select class="form-control elegible" id="tipo_transporte" name="tipo_transporte">
                      <option value="-1">Elija un tipo</option>
                      <option value="1">Barco</option>
                      <option value="2">Avion</option>
                      <option value="3">Camión</option>
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-info pull-right" data-original-title="" title="">Crear</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-9 col-sx-12 col-sm-9">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-truck"></i>
            <h3 class="panel-title">Medios Transporte Disponibles</h3>
          </div>
          <div class="panel-body">
            <?php

              if (!isset($_SESSION['codigo_cliente'])) {
                echo 'No hay cliente definido';
              }  else {
                $query = "SELECT oid, *, 'Camión' FROM camiones UNION SELECT oid, *, 'Avión' FROM aviones UNION SELECT oid, *, 'Barco' FROM barcos;";
              
                conectarBD();
                $resultado = pg_exec($conexion, $query);

                 if(pg_num_rows($resultado) == 0){
                  echo 'No hay camiones registrados';
                } else {
                    echo '<div class="table-responsive">';
                    echo '<div id="dt_example" class="table-responsive example_alt_pagination clearfix">';
                    echo '<table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    ';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th style="width:15%">Marca</th>';
                    echo '<th style="width:15%">Modelo</th>';
                    echo '<th style="width:15%">Tripulación</th>';
                    echo '<th style="width:15%">Combustible (Gal).</th>';
                    echo '<th style="width:10%">Velocidad (km/h)</th>';
                    echo '<th style="width:15%">Carga (Lbs)</th>';
                    echo '<th style="width:15%">Tipo</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                  
                  $conteo = 1;

                  while ($row = pg_fetch_array($resultado)) {
                    echo '<tr>';
                    echo '<th style="width:12%">' . $row['marca'] . '</th>';
                    echo '<th style="width:12%">' . $row['modelo'] . '</th>';
                    echo '<th style="width:12%">' . $row['tripulacion'] . '</th>';
                    echo '<th style="width:12%">' . $row['combustible'] . '</th>';
                    echo '<th style="width:12%">' . $row['velocidad_media'] . '</th>';
                    echo '<th style="width:12%">' . $row['capacidad_peso'] . '</th>';
                    echo '<th style="width:12%">' . $row[8] . '</th>';
                    echo '</tr>';
                  }
                  echo '</tbody>';
                  echo '</table>';
                  echo '</div>';
                  echo '</div>';
                }
              }
            ?> 
          </div>
        </div>
      </div>
    </div>
   </div>
</div>

<!-- Main Container end -->

<?php include 'footer.php' ?>