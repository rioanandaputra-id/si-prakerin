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

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'role:Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
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
