<!-- Left sidebar start -->
<aside id="sidebar">

  <!-- Search bar start
  <div class="custom-search">
    <input type="text" class="search-query" placeholder="Search here">
    <i class="icon-search"></i>
  </div>
       Search bar end -->

  <!-- Menu start -->
  <div id='menu'>
    <ul>
      <li <?php if($thisPage == 'dashboard') { echo 'class="highlight"'; }?>>
        <a href='index.php'>
          <i class="icon-dashboard"></i>
          <span>Dashboard</span>
          <em class="arrow<?php if($thisPage == 'dashboard') { echo '-active'; }?>"></em>
        </a>
      </li>
      <li <?php if($thisPage == 'paquetes') { echo 'class="highlight"'; }?>>
        <a href='paquetes.php'>
          <i class="icon-briefcase"></i>
          <span>Paquetes</span>
          <em class="arrow<?php if($thisPage == 'paquetes') { echo '-active'; }?>"></em>
        </a>
      </li>
      <li <?php if($thisPage == 'nuevo_cliente') { echo 'class="highlight"'; }?>>
        <a href='crear_cliente.php'>
          <i class="icon-list-alt"></i>
          <span>Crear Cliente</span>
          <em class="arrow<?php if($thisPage == 'nuevo_cliente') { echo '-active'; }?>"></em>
        </a>
      </li>
      <li <?php if($thisPage == 'nueva_ruta') { echo 'class="highlight"'; }?>>
        <a href='crear_ruta.php'>
          <i class="icon-table"></i>
          <span>Crear Ruta</span>
          <em class="arrow<?php if($thisPage == 'nueva_ruta') { echo '-active'; }?>"></em>
        </a>
      </li>
      <li <?php if($thisPage == 'transporte') { echo 'class="highlight"'; }?>>
        <a href='transporte.php'>
          <i class="icon-truck"></i>
          <span>Transporte</span>
          <em class="arrow<?php if($thisPage == 'transporte') { echo '-active'; }?>"></em>
        </a>
      </li>
      <li <?php if($thisPage == 'ruta') { echo 'class="highlight"'; }?>>
        <a href='rutas.php'>
          <i class="icon-globe"></i> 
          <span>Estado de Rutas</span>
          <em class="arrow<?php if($thisPage == 'ruta') { echo '-active'; }?>"></em>
        </a>
      </li>
    </ul>
  </div>
  <!-- Menu End -->

  <!-- Extras start -->
  <div class="extras">
    
    <!-- Notifications -->   
      <?php
        if(isset($_SESSION['cliente_creado']) && $_SESSION['cliente_creado']) {
          echo '<ul class="notifications" id="usuario-creado">';
          echo '<li>';
          echo '<i class="icon-user success-bg"></i>';
          echo '<div class="details">';
          echo '<p>Información Agregada</p>';
          echo '<small>Operacion Realizada.</small>';
          echo '</div>';
          echo '</li>';
          echo '</ul>';
          $_SESSION['cliente_creado'] = false;
          }

        if(isset($_SESSION['error_bd']) && $_SESSION['error_bd']) {
          echo '<ul class="notifications" id="error-bd">';
          echo '<li>';
          echo '<i class="icon-fire danger-bg"></i>';
          echo '<div class="details">';
          echo '<p>Error Entrada Datos</p>';
          echo '<small>Información Duplicada</small>';
          echo '</div>';
          echo '</li>';
          echo '</ul>';
          $_SESSION['error_bd'] = false;
        }

        if(isset($_SESSION['error_formulario']) && $_SESSION['error_formulario']) {
          echo '<ul class="notifications" id="error-formulario">';
          echo '<li>';
          echo '<i class="icon-warning-sign warning-bg"></i>';
          echo '<div class="details">';
          echo '<p>Error en Formulario</p>';
          echo '<small>Revisar Campos</small>';
          echo '</div>';
          echo '</li>';
          echo '</ul>';
          $_SESSION['error_formulario'] = false;
        }
      ?>       
  </div>
</aside>
<!-- Left sidebar end -->