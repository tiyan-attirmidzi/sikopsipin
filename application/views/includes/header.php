<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title><?php echo ucwords($this->uri->segment(1)); ?> | SIKOPSIPIN</title>

    <!-- Start Cascading Style Sheets -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Jquery UI -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0-rc.2/jquery-ui.min.css"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/dist/css/skins/_all-skins.min.css">
    <!-- End Cascading Style Sheets -->

    <!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" /> -->
	

    <style>
        .center {
            display: block;
            margin-top:1vh;
            margin-left: auto;
            margin-right: auto;
            /* width: 70%; */
        }
    </style>
    <!--------- End CSS --------->

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
