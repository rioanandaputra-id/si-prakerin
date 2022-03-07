<?php

namespace Config;

$routes = Services::routes();
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('admin', ['namespace' => 'App\Controllers\admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});
$routes->group('dosen', ['namespace' => 'App\Controllers\dosen'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});
$routes->group('mahasiswa', ['namespace' => 'App\Controllers\mahasiswa'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});
$routes->group('tamu', ['namespace' => 'App\Controllers\tamu'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
