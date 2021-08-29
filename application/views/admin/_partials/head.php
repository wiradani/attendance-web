<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

<!-- Bootstrap core CSS-->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

<link type="text/javascript" href=<?php echo base_url('assets/chart.js/Chart.js') ?>>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
<link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />
<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"/>

<script src="<?php echo base_url('assets/leaflet-control-window/L.Control.Window.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/leaflet-control-window/L.Control.Window.css')?>" />





<?php include './assets/custom/customFunction.php' ?>

<style>
    #myLoading{
    width: 50px;
    height: 50px;
    border: solid 5px #ccc;
    border-top-color: #ff6a00;
    border-radius: 100%;

    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    margin: auto;

    animation: putar 2s linear infinite;
    }

    @keyframes putar{
    from{transform: rotate(0deg)}
    to{transform: rotate(360deg)}
    }
    
    .aParent div {
      float: left;
      clear: none; 
    }
  </style>

  <style>
  /* Paste this css to your style sheet file or under head tag */
  /* This only works with JavaScript, 
  if it's not present, don't show loader */
  .no-js #loader { display: none;  }
  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
  .se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
      background: url(<?php echo base_url(); ?>assets/images/loader-64x/Preloader_2.gif) center no-repeat #fff;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
  <script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
      // Animate loader off screen
      $(".se-pre-con").fadeOut("slow");;
    });
  </script>

