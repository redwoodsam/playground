<?php

if(!isset($_SESSION["SESSION_ID"])) {
    header("Location: login.php");
} else {
    header("Location: home.php");
}