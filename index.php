<?php
/*
 * Ruslan Bessarab
 * 01.28.2021
 * Renders home.html template
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

//session
session_start();

require_once('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

//personal info route
$f3->route('GET /personal_info', function () {
    $view = new Template();
    echo $view->render('views/personal_info.html');
});

$f3->route('POST /profile', function () {
    //first name
    if(isset($_POST['fName'])) {
        $_SESSION['fName'] = $_POST['fName'];
    }

    //last name
    if(isset($_POST['lName'])) {
        $_SESSION['lName'] = $_POST['lName'];
    }

    //age
    if(isset($_POST['age'])) {
        $_SESSION['age'] = $_POST['age'];
    }

    //gender
    if(isset($_POST['gender'])) {
        $_SESSION['gender'] = $_POST['gender'];
    }

    //phone number
    if(isset($_POST['number'])) {
        $_SESSION['number'] = $_POST['number'];
    }

    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('POST /interests', function () {
    //email
    if(isset($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }

    //state
    if(isset($_POST['state'])) {
        $_SESSION['state'] = $_POST['state'];
    }

    //seeking
    if(isset($_POST['seeking'])) {
        $_SESSION['seeking'] = $_POST['seeking'];
    }

    //biography
    if(isset($_POST['biography'])) {
        $_SESSION['biography'] = $_POST['biography'];
    }

    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('POST /summary', function () {
    //biography
    if(isset($_POST['interests'])) {
        $_SESSION['interests'] = implode(', ', $_POST['interests']);
    }

    $view = new Template();
    echo $view->render('views/summary.html');
});

$f3->run();
