<?php $this->extend('_admin/_Template') ?>
<?php $this->section('title');
echo 'Dashboard Admin';
$this->endSection(); ?>

<?php $this->section('content');
if (in_groups('Admin')) {
    $dashboard = base_url('admin');
}
if (in_groups('Dosen')) {
    $dashboard = base_url('dosen');
}
if (in_groups('Mahasiswa')) {
    $dashboard = base_url('mahasiswa');
}

echo $dashboard;
$this->endSection(); ?>