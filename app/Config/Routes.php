<?php

namespace Config;

$routes = Services::routes();
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
$routes->setDefaultNamespace('\Myth\Auth\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('admin', ['namespace' => 'App\Controllers\admin', 'filter' => 'role:Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    
    $routes->get('datamaster/admin', 'DataMaster::view_admin');
    $routes->get('datamaster/dosen', 'DataMaster::view_dosen');
    $routes->get('datamaster/mahasiswa', 'DataMaster::view_mahasiswa');
    $routes->get('datamaster/perusahaan', 'DataMaster::view_perusahaan');
    $routes->get('datamaster/tahunakademik', 'DataMaster::view_tahun_akademik');
    $routes->get('datamaster/prodi', 'DataMaster::view_prodi');
    $routes->get('datamaster/dokumen', 'DataMaster::view_dokumen');

    $routes->get('datamaster/admin/add', 'DataMaster::view_add_admin');
    $routes->get('datamaster/dosen/add', 'DataMaster::view_add_dosen');
    $routes->get('datamaster/mahasiswa/add', 'DataMaster::view_add_mahasiswa');
    $routes->get('datamaster/perusahaan/add', 'DataMaster::view_add_perusahaan');
    $routes->get('datamaster/tahunakademik/add', 'DataMaster::view_add_tahun_akademik');
    $routes->get('datamaster/prodi/add', 'DataMaster::view_add_prodi');
    $routes->get('datamaster/dokumen/add', 'DataMaster::view_add_dokumen');

    $routes->get('datamaster/admin/edit', 'DataMaster::view_edit_admin');
    $routes->get('datamaster/dosen/edit', 'DataMaster::view_edit_dosen');
    $routes->get('datamaster/mahasiswa/edit', 'DataMaster::view_edit_mahasiswa');
    $routes->get('datamaster/perusahaan/edit', 'DataMaster::view_edit_perusahaan');
    $routes->get('datamaster/tahunakademik/edit', 'DataMaster::view_edit_tahun_akademik');
    $routes->get('datamaster/prodi/edit', 'DataMaster::view_edit_prodi');
    $routes->get('datamaster/dokumen/edit', 'DataMaster::view_edit_dokumen');

    $routes->post('datamaster/admin/create', 'DataMaster::create_admin');
    $routes->post('datamaster/dosen/create', 'DataMaster::create_dosen');
    $routes->post('datamaster/mahasiswa/create', 'DataMaster::create_mahasiswa');
    $routes->post('datamaster/perusahaan/create', 'DataMaster::create_perusahaan');
    $routes->post('datamaster/tahunakademik/create', 'DataMaster::create_tahun_akademik');
    $routes->post('datamaster/prodi/create', 'DataMaster::create_prodi');
    $routes->post('datamaster/dokumen/create', 'DataMaster::create_dokumen');

    $routes->post('datamaster/admin/update', 'DataMaster::update_admin');
    $routes->post('datamaster/dosen/update', 'DataMaster::update_dosen');
    $routes->post('datamaster/mahasiswa/update', 'DataMaster::update_mahasiswa');
    $routes->post('datamaster/perusahaan/update', 'DataMaster::update_perusahaan');
    $routes->post('datamaster/tahunakademik/update', 'DataMaster::update_tahun_akademik');
    $routes->post('datamaster/prodi/update', 'DataMaster::update_prodi');
    $routes->post('datamaster/dokumen/update', 'DataMaster::update_dokumen');

    $routes->post('datamaster/admin/delete', 'DataMaster::delete_admin');
    $routes->post('datamaster/dosen/delete', 'DataMaster::delete_dosen');
    $routes->post('datamaster/mahasiswa/delete', 'DataMaster::delete_mahasiswa');
    $routes->post('datamaster/perusahaan/delete', 'DataMaster::delete_perusahaan');
    $routes->post('datamaster/tahunakademik/delete', 'DataMaster::delete_tahun_akademik');
    $routes->post('datamaster/prodi/delete', 'DataMaster::delete_prodi');
    $routes->post('datamaster/dokumen/delete', 'DataMaster::delete_dokumen');
});











$routes->group('dosen', ['namespace' => 'App\Controllers\Dosen', 'filter' => 'role:Dosen'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
$routes->group('mahasiswa', ['namespace' => 'App\Controllers\Mahasiswa', 'filter' => 'role:Mahasiswa'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('akun', 'Akun::index');
});
$routes->group('tamu', ['namespace' => 'App\Controllers\Tamu'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
