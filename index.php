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
require('model/validation.php');
require('model/data_layer.php');

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

        //gender is optional
        if(isset($_POST['gender'])) {
            $_SESSION['gender'] = $_POST['gender'];
        }

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
$f3->route('GET|POST /profile', function ($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];

        //Required field
        //email
        if(validEmail($email)) {
            $_SESSION['email'] = $email;
        }
        else {
            $f3->set('errors["email"]', "Email is required");
        }

        //Optional Fields
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

        if(empty($f3->get('errors'))) {
            $f3->reroute('/interests');
        }
    }

    $view = new Template();
    echo $view->render('views/profile.html');
});

//interests route
$f3->route('GET|POST /interests', function ($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inInterests = $_POST['inInterests'];
        $outInterests = $_POST['interests'];

        //if interests were given
        if(isset($inInterests)) {
            if (validInDoor($inInterests)) {
                $_SESSION['inInterests'] = implode(', ', $inInterests);
            } else {
                $f3->set('errors["interests"]', "Spoofing is not allowed here");
            }
        }

        if(isset($outInterests)) {
            if (validOutDoor($outInterests)) {
                $_SESSION['outInterests'] = implode(', ', $outInterests);
            } else {
                $f3->set('errors["interests"]', "Do not spoof!");
            }
        }

        if(empty($f3->get('errors'))) {
            $f3->reroute('/summary');
        }
    }

    $view = new Template();
    echo $view->render('views/interests.html');
});

//summary page route
$f3->route('GET /summary', function () {
    $view = new Template();
    echo $view->render('views/summary.html');
    session_destroy();
});

$f3->run();
