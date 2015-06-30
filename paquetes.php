<?php $thisPage = "paquetes" ?>
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
      <div class="col-md-6 col-sx-12 col-sm-6">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-hand-up"></i>
            <h3 class="panel-title">Enviar Paquete</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" action="do_enviar_paquete.php">
                <div class="form-group">
                  <label for="remitente" class="col-sm-3 control-label">Remitente</label>
                  <div class="col-sm-9">
                    <select class="form-control elegible" id="remitente" name="remitente">
                      <?php
                          $query = "SELECT oid, (persona).nombres || ' ' || (persona).apellidos AS Nombre FROM clientes;";
                          
                          conectarBD();
                          $resultado = pg_exec($conexion, $query);

                          echo '<option value="-1">Elija un cliente</option>';

                          while ($row = pg_fetch_array($resultado)) {
                            echo '<option value="' . $row['oid'] . '">' . $row['nombre'] . '</option>';
                          }
                      ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="destinatario" class="col-sm-3 control-label">Destinatario</label>
                  <div class="col-sm-9">
                    <select class="form-control elegible" id="destinatario" name="destinatario">
                       <?php
                          $query = "SELECT oid, (persona).nombres || ' ' || (persona).apellidos AS Nombre FROM clientes;";
                          
                          conectarBD();
                          $resultado = pg_exec($conexion, $query);

                          echo '<option value="-1">Elija un cliente</option>';

                          while ($row = pg_fetch_array($resultado)) {
                            echo '<option value="' . $row['oid'] . '">' . $row['nombre'] . '</option>';
                          }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="peso" class="col-sm-3 control-label">Peso (Kg)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso del paquete">
                  </div>
                </div>

                <div class="form-group">
                  <label for="dimensiones" class="col-sm-3 control-label">Dimensiones (Cm)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="dimensiones" name="dimensiones" placeholder="Ancho y alto del paquete">
                  </div>
                </div>

                <div class="form-group">
                  <label for="tipo" class="col-sm-3 control-label">Tipo</label>
                  <div class="col-sm-9">
                    <select class="form-control elegible" id="tipo" name="tipo">
                      <option value="n">Normal</option>
                      <option value="f">Fragil</option>
                    </select>
                  </div>
                </div>

               <div class="form-group">
                  <label for="envio" class="col-sm-3 control-label">Envio</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="envio" name="envio">
                    <?php
                          $query = "SELECT ruta from envios;";
                          
                          conectarBD();
                          $resultado = pg_exec($conexion, $query);

                          echo '<option value="-1">Elija una ruta</option>';

                          while ($row = pg_fetch_array($resultado)) {
                            echo '<option value="' . $row['oid'] . '">' . $row['ruta'] . '</option>';
                          }
                      ?>
                    </select>
                  </div>
                </div>


                 <div class="form-group">
                  <label for="fecha_salida" class="col-sm-3 control-label">Fecha salida</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control datepicker" id="fecha_salida" name="fecha_salida">
                  </div>
                </div>


                <div class="form-group">
                  <label for="fecha_llegada" class="col-sm-3 control-label">Fecha estimada de llegada</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control datepicker" id="fecha_llegada" name="fecha_llegada">
                  </div>
                </div>

                <div class="form-group">
                  <label for="estado" class="col-sm-3 control-label">Estado</label>
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" name="estado" id="estado" value="En" checked=""> Enviado
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="estado" id="estado" value="Ent"> Entregado
                    </label>
                  </div>

                   <div class="col-sm-2">
                  <button type="submit" class="btn btn-info pull-right" data-original-title="" title="">Registrar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>

               

      <div class="col-md-6 col-sx-12 col-sm-6">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-hand-down"></i>
            <h3 class="panel-title">Entregar Paquete</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="nombres" class="col-sm-4 control-label">Cod. Paquete</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="cod_paquete" name="cod_paquete" placeholder="XXSRMMQ23412ASD">
                </div>
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