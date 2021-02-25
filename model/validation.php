<?php
/**
 * This file is for validation purpose. Contains function for validation.
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
    return !empty($phone) && is_numeric($phone);
}

function validEmail($email) {
    //using filter_var function we can check for valid email
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}