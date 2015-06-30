<?php $thisPage = nueva_ruta ?>
<?php include 'header.php' ?>
<?php include 'right_sidebar.php' ?>
<?php include 'left_sidebar.php' ?>

<!-- Main Container start -->
<div class="dashboard-wrapper">

  <div class="container">

    <!-- Page title start -->
    <div class="row page-title">
      
      <div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
        <h2>Crear Ruta</h2>
        <ul class="breadcrumb">
          <li>Dashboard</li>
          <li>Crear Ruta</li>
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

    <div class="row">
      <div class="col-md-8 col-sx-12 col-sm-8">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading">
            <i class="icon-signal"></i>
            <h3 class="panel-title">Puntos de Ruta | <span id="id_ruta"></span></h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" action="do_agregar_detalle_ruta.php">
              <div class="form-group">
                <div class="col-sm-6">
                  <select class="form-control elegible" id="ruta_actual" name="ruta">
                    <?php
                      $query = "SELECT r.oid, r.hora_salida as hora_salida , r.hora_estimada_llegada as hora_llegada, (SELECT nombre_ciudad FROM paises WHERE oid = r.ciudad_origen) || ' -> ' || (SELECT nombre_ciudad FROM paises WHERE oid = r.ciudad_destino) AS ruta FROM rutas r;";
                      conectarBD();

                      $resultado = pg_exec($conexion, $query);
                      while ($row = pg_fetch_array($resultado)) {

                        if ($_SESSION['ruta_actual'] == $row['oid']) {
                          $selected = 'selected="selected"';
                        } else {
                          $selected = "";
                        }

                        echo '<option value="' . $row['oid'] .'" '. $selected .'>' . $row['ruta'] . ' [' . $row['hora_salida'] . ' - ' . $row['hora_llegada'] . ']' . '</option>';
                      }

                    ?>
                  </select>
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="longitud" name="longitud" placeholder="Lng">
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="latitud" name="latitud" placeholder="Lat">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-3">
                  <select class="form-control elegible" id="selector_medioTransporte" name="vehiculo">
                    <option value="avion" >Avión</option>
                    <option value="barco">Barco</option>
                    <option value="camion">Camión</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <select class="form-control elegible" id="medioTransporte" name="medioTransporte">
                  </select>
                </div>
                <div class="col-sm-3 pull-right">
                  <button type="submit" class="btn btn-info" data-original-title="" title="">Agregar</button>
                </div>
              </div>

            </form>

            <div class="table-responsive">
              <table class="table table-striped no-margin" id="tabla_descripcion_ruta">
                
              </table>
            </div>

          </div>
        </div>
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading">
            <i class="icon-picture"></i>
            <h3 class="panel-title">Mapa</h3>
          </div>
          <div class="panel-body">
            <div id="gmap_canvas" style="height:500px;">
          </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sx-12 col-sm-4">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading">
            <i class="icon-list"></i>
            <h3 class="panel-title">Datos de la ruta</h3>
          </div>
            <div class="panel-body">
              <form class="form" method="post" action="do_agregar_ruta.php">
                <div class="form-group">
                  <label for="nombres" class="control-label">Lugar Origen</label>
                  <select class="form-control elegible" id="pais_origen" name="pais_origen">
                    <?php
                        $query = "SELECT DISTINCT nombre FROM Paises";
                        
                        conectarBD();
                        $resultado = pg_exec($conexion, $query);

                        while ($row = pg_fetch_array($resultado)) {
                          echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                        }

                      ?>
                  </select>
                  <br />
                  <select class="form-control elegible" id="ciudad_origen" name="ciudad_origen">

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="nombres" class="control-label">Lugar Destino</label>
                  <select class="form-control elegible" id="pais_destino" name="pais_destino">
                    <?php
                        $query = "SELECT DISTINCT nombre FROM Paises";
                        
                        conectarBD();
                        $resultado = pg_exec($conexion, $query);

                        while ($row = pg_fetch_array($resultado)) {
                          echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                        }

                      ?>
                  </select>
                  <br />
                  <select class="form-control elegible" id="ciudad_destino" name="ciudad_destino">
                  </select>
                </div>

                <div class="form-group">
                  <label for="hora_salida" class="control-label">Hora Salida</label>
                  <div class="input-group bootstrap-timepicker">
                    <input class="form-control timepicker-default" id="hora_salida" type="text" name="hora_salida">
                    <span class="input-group-addon"><i class="icon-time"></i></span></input>
                  </div>
                </div>

                <div class="form-group">
                  <label for="hora_llegada" class="control-label">Hora Estimada Llegada</label>
                  <div class="input-group bootstrap-timepicker">
                    <input class="form-control timepicker-default" id="hora_llegada" type="text" name="hora_llegada">
                    <span class="input-group-addon"><i class="icon-time"></i></span></input>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-info pull-right" data-original-title="" title="">Crear</button>
                </div>
              </form>
            </div>
         </div>
      </div>
    </div>
  </div>

</div>
<!-- Main Container end -->

<?php include 'footer.php' ?>