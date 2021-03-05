<?php
/*
 * Ruslan Bessarab
 * 01.28.2021
 * Renders home.html template
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
//session
session_start();

//create an instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

$controller = new Controller($f3);

//define a default route(home page)
$f3->route('GET /', function () {
    global $controller;
    $controller->home();
});

//personal info route
$f3->route('GET|POST /personal_info', function ($f3) {
    global $controller;
    $controller->personal_info();
});

//profile route
$f3->route('GET|POST /profile', function ($f3) {
    global $controller;
    $controller->profile();
});

//interests route
$f3->route('GET|POST /interests', function ($f3) {
    global $controller;
    $controller->interests();
});

//summary page route
$f3->route('GET /summary', function () {
    global $controller;
    $controller->summary();
});

$f3->run();
