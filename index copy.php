<?php $thisPage = "dashboard"; ?>
<?php include 'header.php' ?>
<?php include 'right_sidebar.php' ?>
<?php include 'left_sidebar.php' ?>

<!-- Main Container start -->
<div class="dashboard-wrapper">

  <div class="container">

    <!-- Page title start -->
    <div class="row page-title">
      
      <div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
        <h2>Tracking</h2>
        <ul class="breadcrumb">
          <li>Dashboard</li>
          <li>Home Page</li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-3 hidden-sm hidden-xs">
        <div id="reportrange">
          <i class="icon-calendar"></i>
          Fecha, Hora
        </div>
      </div>
    </div>
    <!-- Page title end -->

        <div class="row sortable">
          <div class="col-md-12 col-sx-12 col-sm-12">
            <div class="panel panel-blue ui-state-default">
              <div class="panel-heading cursor-move">
                <i class="icon-coffee"></i>
                <h3 class="panel-title">Bienvenido, Usuario</h3>
              </div>
              <div class="panel-body">
                <h4>&iexcl;Bienvenido al servicio de Tracking!</h4>
                Bienvenidos a la plataforma de seguimiento virtual de Tracking. Esta plataforma es utilizada para brindar soporte en l&iacute;nea a sus necesidades como cliente.
                <br />
                Recuerde que siempre estamos a su servicio.
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
<!-- Main Container end -->

<?php include 'footer.php' ?>