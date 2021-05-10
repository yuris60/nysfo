<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <base href="<?php echo base_url(); ?>/">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?> | NBC System Information (Nysfo)</title>


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="<?= base_url('assets/') ?>concept/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/libs/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/inputmask/css/inputmask.css" />

  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/charts/chartist-bundle/chartist.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/charts/morris-bundle/morris.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/charts/c3charts/c3.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>concept/assets/vendor/datatables/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>concept/assets/vendor/datatables/css/buttons.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>concept/assets/vendor/datatables/css/select.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>concept/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">

  <!-- Datepicker -->
  <link href="<?= base_url('assets/') ?>vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <!-- Chart -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/charts/chartist-bundle/chartist.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/charts/c3charts/c3.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/charts/morris-bundle/morris.css">

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Monofett&display=swap" rel="stylesheet">

  <style>
    .pengunjung-font-bungee {
      font-family: 'Bungee Inline', cursive;
      font-size: 100px;
    }

    .pengunjung-font-monoton {
      font-family: 'Monoton', cursive;
      font-size: 100px;
    }

    .pengunjung-font-zilla {
      font-family: 'Zilla Slab Highlight', cursive;
      font-size: 120px;
      color: #000;
    }

    .pengunjung-font-monofett {
      font-family: 'Monofett', cursive;
      font-size: 120px;
      color: #5969ff;
    }
  </style>

  <?php
  if ($user == 0) {
    $this->session->set_flashdata('flash-belum-login', 'dahulu');
    redirect('admin/login');
  }
  ?>
</head>

<body>
  <!-- ============================================================== -->
  <!-- main wrapper -->
  <!-- ============================================================== -->
  <div class="dashboard-main-wrapper">