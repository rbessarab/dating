<?php

class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personal_info()
    {
        global $validator;

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
            if($validator->validName($fName)) {
                $_SESSION['fName'] = $fName;
            }
            else {
                $this->_f3->set('errors["fName"]', "First name is required");
            }

            //last name
            if($validator->validName($lName)) {
                $_SESSION['lName'] = $lName;
            }
            else {
                $this->_f3->set('errors["lName"]', "Last name is required");
            }

            //age
            if($validator->validAge($age)) {
                $_SESSION['age'] = $age;
            }
            else {
                $this->_f3->set('errors["age"]', "Appropriate age is required (18+)");
            }

            //phone number
            if($validator->validPhone($number)) {
                $_SESSION['number'] = $number;
            }
            else {
                $this->_f3->set('errors["number"]', "Phone number is required");
            }

            //if no errors -> go to the next page
            if(empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/profile');
            }
        }

        $view = new Template();
        echo $view->render('views/personal_info.html');
    }

    function profile()
    {
        global $validator;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];

            //Required field
            //email
            if($validator->validEmail($email)) {
                $_SESSION['email'] = $email;
            }
            else {
                $this->_f3->set('errors["email"]', "Email is required");
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

            if(empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/interests');
            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');
    }

    function interests()
    {
        global $validator;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inInterests = $_POST['inInterests'];
            $outInterests = $_POST['interests'];

            //if interests were given
            if(isset($inInterests)) {
                if ($validator->validInDoor($inInterests)) {
                    $_SESSION['inInterests'] = implode(', ', $inInterests);
                } else {
                    $this->_f3->set('errors["interests"]', "Do not spoof!");
                }
            }

            if(isset($outInterests)) {
                if ($validator->validOutDoor($outInterests)) {
                    $_SESSION['outInterests'] = implode(', ', $outInterests);
                } else {
                    $this->_f3->set('errors["interests"]', "Do not spoof!");
                }
            }

            if(empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/summary');
            }
        }

        $view = new Template();
        echo $view->render('views/interests.html');
    }

    function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
        session_destroy();
    }

}
