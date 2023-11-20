<?php
require "utils.php";
session_start();

# Reading credentials file
define("CREDENTIALS_FILE", "credentials.json");

$credentials = NULL;

$fileHandle = fopen(CREDENTIALS_FILE, "r");
$string = fread($fileHandle, filesize(CREDENTIALS_FILE));
$credentials = json_decode($string, true);
############################

# Validates submitted form data and redirects user to the due page
$errors = array();
$_SESSION["submitted"] = true;

$username = $_POST["username"];
$password = $_POST["password"];

if (!isValuePresent($username)) {
    array_push($errors, "empty_username");
}

if (!isValuePresent($password)) {
    array_push($errors, "empty_password");
}

if (isValuePresent(array($username, $password))) {
    if ($credentials["username"] == $username && $credentials["password"] == $password) {
        $_SESSION["SESSION_ID"] = "{$username}+{$password}";
        $_SESSION["username"] = $username;
        header("Location: ../home.php");
    } else {
        $errors = array();
        array_push($errors, "incorrect_credentials");
    }
}

if (count($errors) > 0) {
    $_SESSION["errors"] = $errors;
    header("Location: ../login.php");
}
