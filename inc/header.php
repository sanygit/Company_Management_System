<?php
  // require_once('sess_auth.php');
  
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title><?php echo $_settings->info('title') != false ? $_settings->info('title').' | ' : '' ?><?php echo $_settings->info('name') ?></title>
    <link rel="icon" href="<?php echo validate_image($_settings->info('logo')) ?>" />

    <!-- Mobile Specific Metas
   ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="<?php echo base_url ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="<?php echo base_url ?>profile_asset/css/default.css">
  <link rel="stylesheet" href="<?php echo base_url ?>profile_asset/css/layout.css">
   <link rel="stylesheet" href="<?php echo base_url ?>profile_asset/css/media-queries.css">
   <link rel="stylesheet" href="<?php echo base_url ?>profile_asset/css/magnific-popup.css">
   <link rel="stylesheet" href="<?php echo base_url ?>dist/css/custom.css">

   <!-- Script
   ================================================== -->
  <script src="<?php echo base_url ?>profile_asset/js/modernizr.js"></script>

   <!-- Favicons
  ================================================== -->
<style>
  .col-lg-12{
    width:100%;
    padding: 6rem;
  }
  .col-lg-6{
    width:50%;
    padding: 2rem;
  }
  .d-flex{
    display:flex;
    width:100%
  }
  .form-control{
    width: 100% !important;
  }
  .text-light{
    color:white;
  }
  .text-success{
    color:#28a745;
  }
  .text-danger{
    color:#dc3545;
  }
</style>
  </head>