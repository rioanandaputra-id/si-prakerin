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
    $routes->get('datamaster/programstudi', 'DataMaster::view_program_studi');
    $routes->get('datamaster/dokumen', 'DataMaster::view_dokumen');

    $routes->get('datamaster/admin/add', 'DataMaster::view_add_admin');
    $routes->get('datamaster/dosen/add', 'DataMaster::view_add_dosen');
    $routes->get('datamaster/mahasiswa/add', 'DataMaster::view_add_mahasiswa');
    $routes->get('datamaster/perusahaan/add', 'DataMaster::view_add_perusahaan');
    $routes->get('datamaster/tahunakademik/add', 'DataMaster::view_add_tahun_akademik');
    $routes->get('datamaster/programstudi/add', 'DataMaster::view_add_program_studi');
    $routes->get('datamaster/dokumen/add', 'DataMaster::view_add_dokumen');

    $routes->get('datamaster/admin/edit', 'DataMaster::view_edit_admin');
    $routes->get('datamaster/dosen/edit', 'DataMaster::view_edit_dosen');
    $routes->get('datamaster/mahasiswa/edit', 'DataMaster::view_edit_mahasiswa');
    $routes->get('datamaster/perusahaan/edit', 'DataMaster::view_edit_perusahaan');
    $routes->get('datamaster/tahunakademik/edit', 'DataMaster::view_edit_tahun_akademik');
    $routes->get('datamaster/programstudi/edit', 'DataMaster::view_edit_program_studi');
    $routes->get('datamaster/dokumen/edit', 'DataMaster::view_edit_dokumen');

    $routes->post('datamaster/admin/create', 'DataMaster::create_admin');
    $routes->post('datamaster/dosen/create', 'DataMaster::create_dosen');
    $routes->post('datamaster/mahasiswa/create', 'DataMaster::create_mahasiswa');
    $routes->post('datamaster/perusahaan/create', 'DataMaster::create_perusahaan');
    $routes->post('datamaster/tahunakademik/create', 'DataMaster::create_tahun_akademik');
    $routes->post('datamaster/programstudi/create', 'DataMaster::create_program_studi');
    $routes->post('datamaster/dokumen/create', 'DataMaster::create_dokumen');

    $routes->put('datamaster/admin/update', 'DataMaster::update_admin');
    $routes->put('datamaster/dosen/update', 'DataMaster::update_dosen');
    $routes->put('datamaster/mahasiswa/update', 'DataMaster::update_mahasiswa');
    $routes->put('datamaster/perusahaan/update', 'DataMaster::update_perusahaan');
    $routes->put('datamaster/tahunakademik/update', 'DataMaster::update_tahun_akademik');
    $routes->put('datamaster/programstudi/update', 'DataMaster::update_program_studi');
    $routes->put('datamaster/dokumen/update', 'DataMaster::update_dokumen');

    $routes->delete('datamaster/admin/delete', 'DataMaster::delete_admin');
    $routes->delete('datamaster/dosen/delete', 'DataMaster::delete_dosen');
    $routes->delete('datamaster/mahasiswa/delete', 'DataMaster::delete_mahasiswa');
    $routes->delete('datamaster/perusahaan/delete', 'DataMaster::delete_perusahaan');
    $routes->delete('datamaster/tahunakademik/delete', 'DataMaster::delete_tahun_akademik');
    $routes->delete('datamaster/programstudi/delete', 'DataMaster::delete_program_studi');
    $routes->delete('datamaster/dokumen/delete', 'DataMaster::delete_dokumen');
});











$routes->group('dosen', ['namespace' => 'App\Controllers\Dosen', 'filter' => 'role:Dosen'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
$routes->group('mahasiswa', ['namespace' => 'App\Controllers\Mahasiswa', 'filter' => 'role:Mahasiswa'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
$routes->group('tamu', ['namespace' => 'App\Controllers\Tamu'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
