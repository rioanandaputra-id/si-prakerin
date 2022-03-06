<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= "SI-PRAKERIN"; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/backend/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/backend/dist/css/adminlte.min.css'); ?>">
  <?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?= $this->include('_Backend/Partials/Navbar'); ?>
    <?= $this->include('_Backend/Partials/Sidebar'); ?>

    <div class="content-wrapper">
      <?= $this->renderSection('content'); ?>
    </div>

    <?= $this->include('_Backend/Partials/Footer'); ?>
    <?= $this->include('_Backend/Partials/SidebarControl'); ?>

  </div>
  <script src="<?= base_url('assets/backend/plugins/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/dist/js/adminlte.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/raphael/raphael.min.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/jquery-mapael/jquery.mapael.min.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/jquery-mapael/maps/usa_states.min.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/dist/js/demo.js'); ?>"></script>
  <script src="<?= base_url('assets/backend/dist/js/pages/dashboard2.js'); ?>"></script>
  <?= $this->renderSection('js'); ?>
</body>

</html>