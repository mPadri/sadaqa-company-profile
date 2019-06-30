<?php $site = $this->konfigurasi_model->listing(); ?>
<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/upload/img/'.$site->icon) ?>">
    <title><?php echo $title ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate -->
    <link href="<?php echo base_url() ?>assets/template/animate/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/template/css/custom.css" rel="stylesheet">
    <!-- Font Awasome -->
    <link href="<?php echo base_url() ?>assets/template/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>