<?php
/**
 * This file is for validation purpose. Contains functions for validation.
 * model/validation.php
 */

function validName($name) {
    //name should not be empty and should contain only letters
    return !empty($name) && ctype_alpha($name);
}

function validAge($age) {
    //age should be between 18 and 118
    return $age >= 18 && $age <= 118;
}

function validPhone($phone) {
    //phone number should not be empty and can contain only numbers
    return !empty($phone) && filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
}

function validEmail($email) {
    //using filter_var function we can check for valid email
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validInDoor($interest) {
    //finding if the interest is in array of interests
    return in_array($interest, getInDoor());
}

function validOutDoor($interest) {
    return in_array($interest, getOutDoor());
}