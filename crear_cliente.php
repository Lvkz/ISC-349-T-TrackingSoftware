<?php $thisPage = nuevo_cliente ?>
<?php include 'header.php' ?>
<?php include 'right_sidebar.php' ?>
<?php include 'left_sidebar.php' ?>

<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['codigo_cliente'] = $_POST['cliente'];

      $query = "SELECT (persona).nombres || ' ' || (persona).apellidos AS Nombre FROM clientes WHERE oid=" . $_SESSION['codigo_cliente'];
                          
      conectarBD();
      $resultado = pg_exec($conexion, $query);

      while ($row = pg_fetch_array($resultado)) {
        $_SESSION['nombre_cliente'] = $row['nombre'];
      }
  }
?>

<!-- Main Container start -->
<div class="dashboard-wrapper">

  <div class="container">

    <!-- Page title start -->
    <div class="row page-title">
      
      <div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
        <h2>Crear Cliente</h2>
        <ul class="breadcrumb">
          <li>Dashboard</li>
          <li>Crear Cliente</li>
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
      <div class="col-md-7 col-sx-12 col-sm-7">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-user"></i>
            <h3 class="panel-title">Cargar Cliente</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post">
              <div class="form-group"></div>
              <div class="form-group">
                  <div class="col-sm-10">
                    <select class="form-control elegible" id="" name="cliente">
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
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-info pull-right" data-original-title="" title="">Cargar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-list"></i>
            <h3 class="panel-title">Contactos de Cliente | <?php if(isset($_SESSION['nombre_cliente'])){ echo $_SESSION['nombre_cliente'];} else { echo "No Definido"; }?></h3>
          </div>
          <div class="panel-body">
            <?php

              if (!isset($_SESSION['codigo_cliente'])) {
                echo 'No hay cliente definido';
              }  else {
                $query = "SELECT co.telefono, p.nombre_ciudad, p.nombre FROM contactos co, clientes c, paises p WHERE co.cliente = c.oid AND co.ciudad = p.oid AND c.oid = " . $_SESSION['codigo_cliente'] . ";";
              
                conectarBD();
                $resultado = pg_exec($conexion, $query);

                 if(pg_num_rows($resultado) == 0){
                  echo 'Este cliente no tiene contactos';
                } else {
                  echo '<table class="table no-margin">';
                  echo '<thead>';
                  echo '<tr>';
                  echo '<th>#</th>';
                  echo '<th>Teléfono</th>';
                  echo '<th>Ciudad</th>';
                  echo '<th>Pais</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';
                  
                  $conteo = 1;

                  while ($row = pg_fetch_array($resultado)) {
                    echo '<tr>';
                    echo '<td>' . $conteo++ . '</td>';
                    echo '<td>' . $row['telefono'] . '</td>';
                    echo '<td>' . $row['nombre_ciudad'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '</tr>';
                  }
                  echo '</tbody>';
                  echo '</table>';
                }
              }
            ?>
          </div>
        </div>
      </div>

      <div class="col-md-5 col-sx-12 col-sm-5">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-user"></i>
            <h3 class="panel-title">Datos del Cliente</h3>
          </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="do_agregar_cliente.php">
                <div class="form-group">
                  <label for="nombres" class="col-sm-3 control-label">Nombres</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres del Cliente">
                  </div>
                </div>

                <div class="form-group">
                  <label for="apellidos" class="col-sm-3 control-label">Apellidos</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos del Cliente">
                  </div>
                </div>

                <div class="form-group">
                  <label for="identificacion" class="col-sm-3 control-label">Identificacion</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Documento Identificación">
                  </div>
                </div>

                <div class="form-group">
                  <label for="fecha_nacimiento" class="col-sm-3 control-label">Fecha Nacimiento</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control datepicker" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha Nacimiento">
                  </div>
                </div>

                <div class="form-group">
                  <label for="sexo" class="col-sm-3 control-label">Sexo</label>
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" name="sexo" id="sexo" value="M" checked=""> Hombre
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="sexo" id="sexo" value="F"> Mujer
                    </label>
                  </div>

                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-info pull-right" data-original-title="" title="">Crear</button>
                  </div>
                </div>
              </form>
            </div>
         </div>

          <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-phone"></i>
            <h3 class="panel-title">Agregar Contacto | <?php if(isset($_SESSION['nombre_cliente'])){ echo $_SESSION['nombre_cliente'];} else { echo "No Definido"; }?></h3>
          </div>
          <div class="panel-body">
            <form id="contacto" class="form-horizontal" method="post" action="do_agregar_contacto.php">
                <div class="form-group ">
                  <label for="telefono" class="col-sm-3 control-label">Telefono</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="999-999-9999">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pais" class="col-sm-3 control-label">Pais</label>
                  <div class="col-sm-9">
                      <select class="form-control elegible" id="pais_contacto" name="pais">
                        <?php
                          $query = "SELECT DISTINCT nombre FROM Paises";
                          
                          conectarBD();
                          $resultado = pg_exec($conexion, $query);

                          while ($row = pg_fetch_array($resultado)) {
                            echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                          }

                        ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellidos" class="col-sm-3 control-label">Ciudad</label>
                  <div class="col-sm-9">
                    <select class="form-control elegible" id="ciudad_contacto" name="ciudad">
                      
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button type="submit" class="col-sm-12 btn btn-info pull-right <?php if(!isset($_SESSION['codigo_cliente'])){ echo 'disabled';} ?>" data-original-title="" title="">Agregar</button>
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