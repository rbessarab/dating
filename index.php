<?php
/*
 * Ruslan Bessarab
 * 01.28.2021
 * Renders home.html template
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//session start
session_start();

//create an instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

$dataLayer = new DataLayer();
$validator = new Validator();

$datingController = new DatingController($f3);

//define a default route(home page)
$f3->route('GET /', function () {
    global $datingController;
    $datingController->home();
});

//personal info route
$f3->route('GET|POST /personal_info', function ($f3) {
    global $datingController;
    $datingController->personal_info();
});

//profile route
$f3->route('GET|POST /profile', function ($f3) {
    global $datingController;
    $datingController->profile();
});

//interests route
$f3->route('GET|POST /interests', function ($f3) {
    global $datingController;
    $datingController->interests();
});

//summary page route
$f3->route('GET /summary', function () {
    global $datingController;
    $datingController->summary();
    session_destroy();
});

$f3->run();
