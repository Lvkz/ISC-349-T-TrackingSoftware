<?php 
      session_start();
      error_reporting(-1);
      ini_set('display_errors', 'On');

      include 'conexion.php';

      switch($thisPage){
      case 'dashboard':
        $pageName = "Dashboard";
        break;
      case 'paquetes':
        $pageName = "Paquetes";
        break;
      case 'transporte':
        $pageName = "Transporte";
        break;
      case 'rutas':
        $pageName = "Estado de Rutas";
        break;
      case 'nuevo_cliente':
        $pageName = "Crear Cliente";
        break;
      case 'nueva_ruta':
        $pageName = "Crear Ruta";
        break;
      default:
        $pageName = "Titulo Indefinido";
        break;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>TRACKING | <?php echo $pageName;?></title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta name="description" content="Earth Square Admin Dashboard" />
  <meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap" />
  <meta name="author" content="Bootstrap Gallery" />
  <!-- <link rel="shortcut icon" href="../favicon.ico"> -->
  
  <!-- Main CSS -->
  <link href="css/import.css" rel="stylesheet" media="screen">

  <!-- Datepicker CSS-->
  <link href="css/datepicker.css" rel="stylesheet" media"screen">

  <!-- Select2 CSS-->
  <link href="css/select2.css" rel="stylesheet" media"screen">
  <link href="css/select2-bootstrap.css" rel="stylesheet" media"screen">

  <!-- Timepicker CSS -->
  <link href="css/timepicker.css" rel="stylesheet" media"screen">

  <!-- Font Awesome CSS -->
  <link href="fonts/font-awesome.css" rel="stylesheet">
  <!--[if IE 7]>
    <link rel="stylesheet" href="fonts/font-awesome.css">
  <![endif]-->

  <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->

</head>

<body class="animated fadeInDown" onload="updateClock(); setInterval('updateClock()', 1000)">

  <!-- Top Bar Start -->
  <div class="top-bar">

    <!-- Logo start -->
    <a href="index.php" class="logo"><img src="img/brand-logo-tracking.png" alt="EarthSquare"></a>
    <!-- Logo end -->

    <!-- Mini Nav Right Start -->
    <ul id="mini-nav-right">
      <li class="list-box hidden-xs">
        <a href="login.html">
          <i class="icon-signout"></i>
        </a>
      </li>
    </ul>
    <!-- Mini Nav Right End -->

  </div>
  <!-- Top Bar End -->