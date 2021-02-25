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
require_once('model/validation.php');
require_once('model/data_layer.php');

//create an instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

//personal info route
$f3->route('GET|POST /personal_info', function ($f3) {
    //if the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $age = $_POST['age'];
        $number = $_POST['number'];

        //if the data is valid -> store to the session array
        //first name
        if(validName($fName)) {
            $_SESSION['fName'] = $fName;
        }
        else {
            $f3->set('errors["fName"]', "First name is required");
        }

        //last name
        if(validName($lName)) {
            $_SESSION['lName'] = $lName;
        }
        else {
            $f3->set('errors["lName"]', "Last name is required");
        }

        //age
        if(validAge($age)) {
            $_SESSION['age'] = $age;
        }
        else {
            $f3->set('errors["age"]', "Appropriate age is required (18+)");
        }

        //phone number
        if(validPhone($number)) {
            $_SESSION['number'] = $number;
        }
        else {
            $f3->set('errors["number"]', "Phone number is required");
        }

        //if no errors -> go to the next page
        if(empty($f3->get('errors'))) {
            $f3->reroute('/profile');
        }
    }

    $view = new Template();
    echo $view->render('views/personal_info.html');
});

//profile route
$f3->route('GET|POST /profile', function () {
    $view = new Template();
    echo $view->render('views/profile.html');
});

//interests route
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

//summary page route
$f3->route('POST /summary', function () {
    //biography
    if(isset($_POST['interests'])) {
        $_SESSION['interests'] = implode(', ', $_POST['interests']);
    }

    $view = new Template();
    echo $view->render('views/summary.html');
});

$f3->run();
