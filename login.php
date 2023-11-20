<?php
require "internal/authentication.php";
validateAuthentication();

$errors = null;
$submitted = null;

if (isset($_SESSION["submitted"])) {
    $submitted = $_SESSION["submitted"];
}

if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
}

$userBlank = false;
$passBlank = false;
$incorrectCredentials = false;

if (is_array($errors)) {
    if ($submitted === true) {
        $userBlank = in_array("empty_username", $errors);
        $passBlank = in_array("empty_password", $errors);
        $incorrectCredentials = in_array("incorrect_credentials", $errors);
    }
}

if (isset($_SESSION["SESSION_ID"]) && strlen($_SESSION["SESSION_ID"]) > 0) {
    header("Location: home.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restricted Area</title>
</head>

<body>
    <h1>Log in with your account</h1>
    <form action="internal/logon.php" method="POST">
        <?php if ($incorrectCredentials) : ?>
            <span style="color: red">Invalid user/password. Please try again.</span>
        <?php endif ?>
        <div class="form-control">
            <label for="username">User</label>
            <br>
            <input type="text" name="username">
            <?php if ($userBlank) : ?>
                <span style="color: red">User cannot be blank</span>
            <?php endif ?>
        </div>
        <div class="form-control">
            <label for="username">Password</label>
            <br>
            <input type="password" name="password">
            <?php if ($passBlank) : ?>
                <span style="color: red">Password cannot be blank</span>
            <?php endif ?>
        </div>
        <br>
        <button type="submit">Log in</button>
    </form>
</body>

</html>

<?php
if (isset($_SESSION["submitted"])) {
    $_SESSION["submitted"] = null;
}
?>