<?php
/**
 * This file is for validation purpose. Contains functions for validation.
 * model/validation.php
 */

/**
 * Takes name parameter and checks if it's not empty and contains only letters
 * @param $name string
 * @return bool
 */
function validName($name)
{
    //name should not be empty and should contain only letters
    return !empty($name) && ctype_alpha($name);
}

/**
 * Takes age parameter and checks if it's between 18 and 118
 * @param $age int
 * @return bool
 */
function validAge($age)
{
    //age should be between 18 and 118
    return $age >= 18 && $age <= 118;
}

/**
 * Using filter_var() function checks if the number is valid
 * @param $phone int
 * @return bool
 */
function validPhone($phone)
{
    //phone number should not be empty and can contain only numbers
    return !empty($phone) && filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
}

/**
 * Using filter_var() for checking if email is valid
 * @param $email string
 * @return bool
 */
function validEmail($email)
{
    //using filter_var function we can check for valid email
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * takes array and compare each element to the original array of indoor interests
 * @param $interests array
 * @return bool
 */
function validInDoor($interests)
{
    //finding if the interest is in array of interests
    $validInterests = getInDoor();
    foreach($interests as $interest) {
        if(!in_array($interest, $validInterests)) {
            return false;
        }
    }
    return true;
}

/**
 * takes array and compare each element to the original array of outdoor interests
 * @param $interests array
 * @return bool
 */
function validOutDoor($interests)
{
    //finding if the interest is in array of interests
    $validInterests = getOutDoor();
    foreach($interests as $interest) {
        if(!in_array($interest, $validInterests)) {
            return false;
        }
    }
    return true;
}