<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title'); ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/dist/css/adminlte.min.css'); ?>">

  <link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">

    <?= $this->include('_template/adminlte-v3/Navbar'); ?>
    <?= $this->include('_template/adminlte-v3/Sidebar'); ?>

    <div class="content-wrapper">
      <?= $this->renderSection('content'); ?>
    </div>

    <?= $this->include('_template/adminlte-v3/Footer'); ?>

  </div>

  <script src="<?= base_url('assets/adminlte-v3/plugins/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/dist/js/adminlte.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/raphael/raphael.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/jquery-mapael/jquery.mapael.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/jquery-mapael/maps/usa_states.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/dist/js/demo.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/dist/js/pages/dashboard2.js'); ?>"></script>

  <script src="<?= base_url('assets/adminlte-v3/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminlte-v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?= $this->renderSection('js'); ?>
</body>

</html>