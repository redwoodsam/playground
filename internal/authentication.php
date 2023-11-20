<?php
session_start();

function validateAuthentication() {
    $currentPage = basename($_SERVER["SCRIPT_NAME"]);
    if(isset($_SESSION["SESSION_ID"]) && strlen($_SESSION["SESSION_ID"]) > 0 && $currentPage === "login.php") {
        header("Location: home.php");
    }

    if((!isset($_SESSION["SESSION_ID"]) || strlen($_SESSION["SESSION_ID"]) == 0) && $currentPage !== "login.php") {
        header("Location: login.php");
    }
}
