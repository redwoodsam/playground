<?php
require "internal/authentication.php";
validateAuthentication();

$loggedUser = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
   <h1>Welcome, <?= $loggedUser ?>!</h1> 
   <a href="internal/logout.php">Logout</a>
</body>
</html>