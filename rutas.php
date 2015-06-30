<?php $thisPage = ruta ?>
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
      <div class="col-md-4 col-sx-12 col-sm-4">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-coffee"></i>
            <h3 class="panel-title">Estado de Envíos</h3>
          </div>
          <div class="panel-body">
            <table class="table no-margin">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Envio</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Otto</td>
                    <td>@baswa</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Harris</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Mr. Perfect</td>
                    <td>@batman</td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-sx-12 col-sm-8">
        <div class="panel panel-info ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-world"></i>
            <h3 class="panel-title">Mapa</h3>
          </div>
          <div class="panel-body">
            <div style="height:500px;overflow:hidden;">
              <style type="text/css" media="screen">.gm-style img{max-width: none; !important; background:none !important;}.gm-style-iw{height:auto !important; color:#000000; display:block; white-space:nowrap; width:auto !important; line-height:18px; overflow:hidden !important;}</style>
              <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
              <div style="height:500px;overflow:hidden;">
                <div id="gmap_canvas" style="height:500px;"></div>
              <a href="http://www.sparbach.de" class="map-data">http://www.sparbach.de</a></div>
              <script type="text/javascript">function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(40.8054567,-73.96547470000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.8054567, -73.96547470000002)}); infowindow = new google.maps.InfoWindow({content:"<span style='height:auto !important; display:block; white-space:nowrap; overflow:hidden !important;'><strong style='font-weight:400;'>The Breslin</strong><br>2880 Broadway<br> New York</span>" }); google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);}); infowindow.open(map,marker);}google.maps.event.addDomListener (window, "load", init_map);</script></div>
          </div>
        </div>
      </div>
    </div>

</div>
<!-- Main Container end -->

<?php include 'footer.php' ?>