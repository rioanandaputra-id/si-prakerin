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

    $routes->get('datamaster/dosen', 'DataMaster::DosenView');
    $routes->get('datamaster/mahasiswa', 'DataMaster::MahasiswaView');
    $routes->get('datamaster/perusahaan', 'DataMaster::PerusahaanView');
    $routes->get('datamaster/tahunakademik', 'DataMaster::TahunAkademikView');
    $routes->get('datamaster/prodi', 'DataMaster::ProdiView');
    $routes->get('datamaster/dokumen', 'DataMaster::DokumenView');

    $routes->get('datamaster/dosen/add', 'DataMaster::DosenViewAdd');
    $routes->get('datamaster/mahasiswa/add', 'DataMaster::MahasiswaViewAdd');
    $routes->get('datamaster/perusahaan/add', 'DataMaster::PerusahaanViewAdd');
    $routes->get('datamaster/tahunakademik/add', 'DataMaster::TahunAkademikViewAdd');
    $routes->get('datamaster/prodi/add', 'DataMaster::ProdiViewAdd');
    $routes->get('datamaster/dokumen/add', 'DataMaster::DokumenViewAdd');

    $routes->get('datamaster/dosen/edit', 'DataMaster::DosenViewEdit');
    $routes->get('datamaster/mahasiswa/edit', 'DataMaster::MahasiswaViewEdit');
    $routes->get('datamaster/perusahaan/edit', 'DataMaster::PerusahaanViewEdit');
    $routes->get('datamaster/tahunakademik/edit', 'DataMaster::TahunAkademikViewEdit');
    $routes->get('datamaster/prodi/edit', 'DataMaster::ProdiViewEdit');
    $routes->get('datamaster/dokumen/edit', 'DataMaster::DokumenViewEdit');

    $routes->post('datamaster/dosen/create', 'DataMaster::DosenCreate');
    $routes->post('datamaster/mahasiswa/create', 'DataMaster::MahasiswaCreate');
    $routes->post('datamaster/perusahaan/create', 'DataMaster::PerusahaanCreate');
    $routes->post('datamaster/tahunakademik/create', 'DataMaster::TahunAkademikCreate');
    $routes->post('datamaster/prodi/create', 'DataMaster::ProdiCreate');
    $routes->post('datamaster/dokumen/create', 'DataMaster::DokumenCreate');

    $routes->post('datamaster/dosen/update', 'DataMaster::DosenUpdate');
    $routes->post('datamaster/mahasiswa/update', 'DataMaster::MahasiswaUpdate');
    $routes->post('datamaster/perusahaan/update', 'DataMaster::PerusahaanUpdate');
    $routes->post('datamaster/tahunakademik/update', 'DataMaster::TahunAkademikUpdate');
    $routes->post('datamaster/prodi/update', 'DataMaster::ProdiUpdate');
    $routes->post('datamaster/dokumen/update', 'DataMaster::DokumenUpdate');

    $routes->post('datamaster/dosen/delete', 'DataMaster::DosenDelete');
    $routes->post('datamaster/mahasiswa/delete', 'DataMaster::MahasiswaDelete');
    $routes->post('datamaster/perusahaan/delete', 'DataMaster::PerusahaanDelete');
    $routes->post('datamaster/tahunakademik/delete', 'DataMaster::TahunAkademikDelete');
    $routes->post('datamaster/prodi/delete', 'DataMaster::ProdiDelete');
    $routes->post('datamaster/dokumen/delete', 'DataMaster::DokumenDelete');
});











$routes->group('mahasiswa', ['namespace' => 'App\Controllers\Mahasiswa', 'filter' => 'role:Mahasiswa'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('praktikindustri', 'PraktikIndustri::index');
    $routes->get('praktikindustri/add', 'PraktikIndustri::add');
    $routes->get('praktikindustri/edit', 'PraktikIndustri::edit');

    $routes->get('praktikindustri/delete', 'PraktikIndustri::delete');
    $routes->get('praktikindustri/delete', 'PraktikIndustri::delete');
    $routes->get('praktikindustri/delete', 'PraktikIndustri::delete');
});

$routes->group('dosen', ['namespace' => 'App\Controllers\Dosen', 'filter' => 'role:Dosen'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

$routes->group('tamu', ['namespace' => 'App\Controllers\Tamu'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
