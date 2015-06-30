var $border_color = "#efefef";
var $grid_color = "#ddd";
var $default_black = "#666";
var $primary = "#575348";
var $secondary = "#8FBB6C";
var $orange = "#F38733";

// SparkLine Bar
$(function () {
  $('#currentSale').sparkline([23213, 63216, 82234, 29341, 61789, 88732, 11234, 54328, 33245], {
    type: 'bar',
    barColor: [$orange, $secondary],
    barWidth: 6,
    height: 18,
  });

  $('#currentBalance').sparkline([33251, 98123, 54312, 88763, 12341, 55672, 87904, 23412, 17632], {
    type: 'bar',
    barColor: [$secondary, $primary],
    barWidth: 6,
    height: 18,
  });
  
});

//Sortable
$(function() {
  $( ".sortable" ).sortable();
  $( ".sortable" ).disableSelection();
});

//Datepicker
$(function() {
  $("#datepicker" ).datepicker();
});

//Dropdown Menu
$( document ).ready(function() {
  $('#menu > ul > li > a').click(function() {
    $('#menu li').removeClass('active');
    $(this).closest('li').addClass('active'); 
    var checkElement = $(this).next();
    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      $(this).closest('li').removeClass('active');
      checkElement.slideUp('normal');
    }
    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      $('#menu ul ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
    }
    if($(this).closest('li').find('ul').children().length == 0) {
      return true;
    } else {
      return false; 
    }   
  });
});


$(function() {
  $(document).ready(function() {
    $.slidebars();
  });
});

//Sidebar
$(function() {
  var s = 0;
  
  $('.arrow-box').click(function() {
    if (s == 0) {
      s = 1;
      $('#sidebar').css('left', '-220px');
      $('.dashboard-wrapper').css('margin-left', '0px');
      $('.logo').css('background', 'transparent');
    } else {
      s = 0;
      $('#sidebar').css('left', '0');
      $('.dashboard-wrapper').css('margin-left', '220px');
      $('.logo').css('background', '');
    }
  });
});

//Tooltip
$('a').tooltip();

//Popover
$('button').popover();


//
$('#mob-nav').click(function(){
  if($('aside.open').length > 0){
    $('aside').attr('style', 'left: -220px').removeClass('open')
  } else {
    $('aside').attr('style', 'left: 0px').addClass('open')
  }
});

//Reloj
$('#clock').ready(function(){
    var updateClock = function(){
        var time = (new Date()).toString().match(/ (\d\d:\d\d):\d\d/);
        $('#clock').text(time[1]);
    };
    setInterval(function(){
        updateClock(); 
    },60000);
    updateClock();
});

//Datepicker
$(function() {
  $('.datepicker').datepicker();

  $('.datepicker').on('changeDate', function(ev){
    $(this).datepicker('hide');
  });
});

//Timepicker
$(function() {
  $(".timepicker-default").timepicker();
});

//Select2
$(function() {
  $(".elegible").select2();
});

//Ocultar Notificaciones
$(function() {
  $(document).ready( function() {
        $('#usuario-creado').delay(5000).fadeOut();
      });
});

$(function() {
  $(document).ready( function() {
        $('#error-bd').delay(5000).fadeOut();
      });
});

//Ocultar Notificaciones
$(function() {
  $(document).ready( function() {
        $('#error-formulario').delay(5000).fadeOut();
      });
});

//Cargar Combobox
$(function() {
  $(document).ready(function() {
    $.ajax({
      type: "GET", 
      url: "cargarCiudades.php",
      data: "seleccionID="+$("#pais_contacto").val(),
      success: function(html) {
        $("#ciudad_contacto").html(html);
        $("#ciudad_contacto").select2();
      }
    });

   
    $.ajax({
      type: "GET", 
      url: "cargarCiudades.php",
      data: "seleccionID="+$("#pais_origen").val(),
      success: function(html) {
        $("#ciudad_origen").html(html);
        $("#ciudad_origen").select2();
      }
    });

    $.ajax({
      type: "GET", 
      url: "cargarCiudades.php",
      data: "seleccionID="+$("#pais_destino").val(),
      success: function(html) {
        $("#ciudad_destino").html(html);
        $("#ciudad_destino").select2();
      }
    });

    $.ajax({
      type: "GET", 
      url: "cargarMediotransporte.php",
      data: "seleccionID="+$("#selector_medioTransporte").val(),
      success: function(html) {
        $("#medioTransporte").html(html);
        $("#medioTransporte").select2();
      }
    });

    $.ajax({
      type: "GET", 
      url: "cargarRuta.php",
      data: "seleccionID="+$("#ruta_actual").val(),
      success: function(html) {
         $("#id_ruta").html(html);
      }
    });

    $.ajax({
      type: "GET", 
      url: "cargarDescripcionRuta.php",
      data: "seleccionID="+$("#ruta_actual").val(),
      success: function(html) {
         $("#tabla_descripcion_ruta").html(html);
      }
    });
});
  
  $("#pais_contacto").change(function() {
    $.ajax({
        type: "GET", 
        url: "cargarCiudades.php",
        data: "seleccionID="+$("#pais_contacto").val(),
        success: function(html) {
          $("#ciudad_contacto").html(html);
          $("#ciudad_contacto").select2();
        }
    });
  });

  $("#pais_origen").change(function() {
    $.ajax({
        type: "GET", 
        url: "cargarCiudades.php",
        data: "seleccionID="+$("#pais_origen").val(),
        success: function(html) {
          $("#ciudad_origen").html(html);
          $("#ciudad_origen").select2();
        }
    });
  });

  $("#pais_destino").change(function() {
    $.ajax({
        type: "GET", 
        url: "cargarCiudades.php",
        data: "seleccionID="+$("#pais_destino").val(),
        success: function(html) {
          $("#ciudad_destino").html(html);
          $("#ciudad_destino").select2();
        }
    });
  });
});

$("#selector_medioTransporte").change(function() {
  $.ajax({
      type: "GET", 
      url: "cargarMediotransporte.php",
      data: "seleccionID="+$("#selector_medioTransporte").val(),
      success: function(html) {
        $("#medioTransporte").html(html);
        $("#medioTransporte").select2();
      }
    });
});

$("#ruta_actual").change(function() {
  $.ajax({
    type: "GET", 
    url: "cargarRuta.php",
    data: "seleccionID="+$("#ruta_actual").val(),
    success: function(html) {
      $("#id_ruta").html(html);
      location.reload(true);
    }
  });

  $.ajax({
    type: "GET", 
    url: "cargarDescripcionRuta.php",
    data: "seleccionID="+$("#ruta_actual").val(),
    success: function(html) {
       $("#tabla_descripcion_ruta").html(html);
    }
  });
})