<?php
session_start();

$page = isset($_GET["page"]) ? $_GET["page"] : "login";

if (isset($_POST["register"])) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    header("Location: ?page=login");
}

if (isset($_POST["login"])) {

    if (
        $_POST["username"] == $_SESSION["username"] &&
        $_POST["password"] == $_SESSION["password"]
    ) {

        $_SESSION["login"] = true;
        header("Location: ?page=profile");

    } else {
        $error = "Wrong Username Or Password";
    }
}

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: ?page=login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Task</title>
</head>
<body>

<div style="text-align:right">

<?php
if (isset($_SESSION["login"])) {

    echo $_SESSION["username"];
    echo " | ";
    echo '<a href="?logout=1">Logout</a>';

} else {

    echo '<a href="?page=register">Register</a>';
    echo " | ";
    echo '<a href="?page=login">Login</a>';
}
?>

</div>

<hr>

<?php

if ($page == "register") {
?>

<h2>Register</h2>

<form method="post">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <button name="register">Register</button>
</form>

<?php
}


elseif ($page == "login") {
?>

<h2>Login</h2>

<form method="post">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <button name="login">Login</button>
</form>

<?php
if (isset($error)) {
    echo $error;
}
}

elseif ($page == "profile") {

    if (!isset($_SESSION["login"])) {
        header("Location: ?page=login");
    }

    echo "<h2>Profile</h2>";
    echo "<h3>Welcome " . $_SESSION["username"] . "</h3>";
}
?>

</body>
</html>